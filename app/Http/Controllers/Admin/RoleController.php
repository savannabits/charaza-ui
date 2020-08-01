<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class RoleController extends Controller
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
                "data" => "display_name",
                "name" => "display_name",
                "title" => "Display Name"
            ],
            [
                "data" => "guard_name",
                "name" => "guard_name",
                "title" => "Guard Name"
            ],
            [
                "data" => "enabled",
                "name" => "enabled",
                "title" => "Enabled"
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
                "event" => "show-role",
                "classes" => "btn btn-secondary rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "edit",
                "icon" => "mdi mdi-pencil",
                "event" => "edit-role",
                "classes" => "btn btn-primary rounded-0"
            ],
        ];
        return view('backend.roles.index', compact('columns', 'actions'));
    }
}
