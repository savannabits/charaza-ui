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
        $this->authorize('users.index');
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
                "data" => "updated_at",
                "name" => "updated_at",
                "title" => "Updated At"
            ],
            ];

        return view('backend.users.index', compact('columns'));
    }
}
