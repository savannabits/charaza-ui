<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Article\IndexArticle;
use App\Http\Requests\Api\Article\StoreArticle;
use App\Http\Requests\Api\Article\UpdateArticle;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Savannabits\Savadmin\Helpers\SavbitsHelper;
use Yajra\DataTables\Facades\DataTables;

class ArticleController  extends Controller
{
    private $api, $helper;
    public function __construct(ApiResponse $apiResponse, SavbitsHelper $helper)
    {
        $this->api = $apiResponse;
        $this->helper = $helper;
    }

    /**
     * Display a listing of the resource (paginated).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexArticle $request)
    {
        $data = $this->helper::listing(Article::class, $request)->customQuery(function ($builder) use($request) {
        /**@var  Article|Builder $builder*/
        // Add custom queries here
        })->process();
        return $this->api->success()->message("List of Articles")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::of(Article::query())
            ->addColumn("actions",function($model) {
                $actions = '';
                if (\Auth::user()->can('articles.show')) $actions .= '<button class="btn btn-outline-primary btn-square action-button mr-2" title="View Details" data-action="show-article" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-eye"></i></button>';
                if (\Auth::user()->can('articles.edit')) $actions .= '<button class="btn btn-outline-warning btn-square action-button mr-2" title="Edit Item" data-action="edit-article" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-pencil"></i></button>';
                if (\Auth::user()->can('articles.delete')) $actions .= '<button class="btn btn-outline-danger btn-square action-button mr-2" title="Delete Item" data-action="delete-article" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-delete"></i></button>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticle $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreArticle $request)
    {
        try {
            $array = $request->sanitizedArray();
            $article = new Article($array);
            
            // Save Relationships
            $object = $request->sanitizedObject();
            if (isset($object->author)) {
                $article->author()
                    ->associate($object->author->id);
            }
                        

            $article->saveOrFail();
            return $this->api->success()->message('Article Created')->payload($article)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Article $article)
    {
        try {
            //Fetch relationships
            $article->load([
            'author',
        ]);
            return $this->api->success()->message("Article $article->id")->payload($article)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArticle $request
     * @param {$modelBaseName} $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateArticle $request, Article $article)
    {
        try {
            $data = $request->sanitizedArray();
            $article->update($data);
            
            // Save Relationships
                $object = $request->sanitizedObject();
            if (isset($object->author)) {
                $article->author()
                    ->associate($object->author->id);
            }
                        

            $article->saveOrFail();
            return $this->api->success()->message("Article has been updated")->payload($article)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return $this->api->success()->message("Article has been deleted")->payload($article)->code(200)->send();
    }

}
