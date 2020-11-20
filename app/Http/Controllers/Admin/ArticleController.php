<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('articles.index');
        $columns = [
            [
                "data" => "id",
                "name" => "id",
                "title" => "Id"
            ],
            [
                "data" => "title",
                "name" => "title",
                "title" => "Title"
            ],
            [
                "data" => "description",
                "name" => "description",
                "title" => "Description"
            ],
            [
                "data" => "updated_at",
                "name" => "updated_at",
                "title" => "Updated At"
            ],
            ];

        return view('backend.articles.index', compact('columns'));
    }
}
