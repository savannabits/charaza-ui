<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $columns = [
            [
                "data" => "id",
                "name" => "id",
            ],
            [
                "data" => "name",
                "name" => "name",
                "title" => "Full Name"
            ],
            [
                "data" => "email",
                "name" => "email",
                "title" => "Email Address"
            ],
            [
                "data" => "updated_at",
                "name" => "updated_at",
                "title" => "Last Updated"
            ],

        ];
        $actions = [
            [
                "tag" => "button",
                "href" => "",
                "title" => "",
                "icon" => "mdi mdi-eye",
                "event" => "show-user",
                "classes" => "btn btn-secondary rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "",
                "icon" => "mdi mdi-pencil",
                "event" => "edit-user",
                "classes" => "btn btn-primary rounded-0"
            ],
        ];
        return view('backend.users.index', compact('columns', 'actions'));
    }
}
