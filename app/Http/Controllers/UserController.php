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
        ];
        $actions = [
            [
                "tag" => "a",
                "href" => "",
                "title" => "Details",
                "icon" => "fa fa-pencil",
                "event" => "edit-user",
                "classes" => "btn btn-light rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "Edit",
                "icon" => "fa fa-pencil",
                "event" => "edit-user",
                "classes" => "btn btn-info rounded-0"
            ],
        ];
        return view('backend.users.index', compact('columns', 'actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
