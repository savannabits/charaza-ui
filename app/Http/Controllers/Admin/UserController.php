<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class UserController extends Controller
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
                "data" => "username",
                "name" => "username",
                "title" => "Username"
            ],
            [
                "data" => "email",
                "name" => "email",
                "title" => "Email"
            ],
            [
                "data" => "name",
                "name" => "name",
                "title" => "Name"
            ],
            [
                "data" => "first_name",
                "name" => "first_name",
                "title" => "First Name"
            ],
            [
                "data" => "middle_name",
                "name" => "middle_name",
                "title" => "Middle Name"
            ],
            [
                "data" => "last_name",
                "name" => "last_name",
                "title" => "Last Name"
            ],
            [
                "data" => "email_verified_at",
                "name" => "email_verified_at",
                "title" => "Email Verified At"
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
                "event" => "show-user",
                "classes" => "btn btn-secondary rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "edit",
                "icon" => "mdi mdi-pencil",
                "event" => "edit-user",
                "classes" => "btn btn-primary rounded-0"
            ],
        ];
        return view('backend.users.index', compact('columns', 'actions'));
    }
}
