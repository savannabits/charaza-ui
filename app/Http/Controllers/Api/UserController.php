<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\IndexUser;
use App\Http\Requests\Api\User\StoreUser;
use App\Http\Requests\Api\User\UpdateUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Savannabits\Savadmin\Helpers\SavbitsHelper;
use Yajra\DataTables\Facades\DataTables;

class UserController  extends Controller
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
    public function index(IndexUser $request)
    {
        $data = $this->helper::listing(User::class, $request)->customQuery(function ($builder) use($request) {
        /**@var  User|Builder $builder*/
        // Add custom queries here
        })->process();
        return $this->api->success()->message("List of Users")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::of(User::query())
            ->addColumn("actions",function($model) {
                $actions = '';
                if (\Auth::user()->can('users.show')) $actions .= '<button class="btn btn-outline-primary btn-square action-button mr-2" title="View Details" data-action="show-user" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-eye"></i></button>';
                if (\Auth::user()->can('users.edit')) $actions .= '<button class="btn btn-outline-warning btn-square action-button mr-2" title="Edit Item" data-action="edit-user" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-pencil"></i></button>';
                if (\Auth::user()->can('users.delete')) $actions .= '<button class="btn btn-outline-danger btn-square action-button mr-2" title="Delete Item" data-action="delete-user" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-delete"></i></button>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUser $request)
    {
        try {
            $array = $request->sanitizedArray();
            $user = new User($array);
            
            // Save Relationships
            $object = $request->sanitizedObject();
                        

            $user->saveOrFail();
            return $this->api->success()->message('User Created')->payload($user)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, User $user)
    {
        try {
            //Fetch relationships
                        return $this->api->success()->message("User $user->id")->payload($user)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser $request
     * @param {$modelBaseName} $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUser $request, User $user)
    {
        try {
            $data = $request->sanitizedArray();
            $user->update($data);
            
            // Save Relationships
                $object = $request->sanitizedObject();
                

            $user->saveOrFail();
            return $this->api->success()->message("User has been updated")->payload($user)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return $this->api->success()->message("User has been deleted")->payload($user)->code(200)->send();
    }

}
