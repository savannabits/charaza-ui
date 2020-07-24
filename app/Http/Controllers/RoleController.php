<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
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
                "title" => "Name"
            ],
            [
                "data" => "display_name",
                "name" => "display_name",
                "title" => "Display Name"
            ],
            [
                "data" => "enabled",
                "name" => "enabled",
                "title" => "Enabled"
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
                "event" => "show-role",
                "classes" => "btn btn-secondary rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "",
                "icon" => "mdi mdi-pencil",
                "event" => "edit-role",
                "classes" => "btn btn-primary rounded-0"
            ],
        ];
        return view('backend.roles.index', compact('columns', 'actions'));
    }
}
