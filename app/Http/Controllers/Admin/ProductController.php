<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $columns = [
            [
                "data" => "id",
                "name" => "id",
                "title" => "Id"
            ],
            [
                "data" => "name",
                "name" => "name",
                "title" => "Name"
            ],
            [
                "data" => "active",
                "name" => "active",
                "title" => "Active"
            ],
            [
                "data" => "updated_at",
                "name" => "updated_at",
                "title" => "Updated At"
            ],
            ];
        $actions = [
            [
                "tag" => "button",
                "href" => "",
                "title" => "details",
                "icon" => "mdi mdi-eye",
                "event" => "show-product",
                "classes" => "btn btn-secondary rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "edit",
                "icon" => "mdi mdi-pencil",
                "event" => "edit-product",
                "classes" => "btn btn-primary rounded-0"
            ],
        ];
        return view('backend.products.index', compact('columns', 'actions'));
    }
}
