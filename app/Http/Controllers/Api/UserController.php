<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\StoreRole;
use App\Http\Requests\users\StoreUser;
use App\Http\Requests\users\UpdateRole;
use App\Http\Requests\users\UpdateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $api;
    public function __construct(ApiResponse $apiResponse)
    {
        $this->api = $apiResponse;
    }

    /**
     * Display a listing of the resource (paginated).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::paginate();
        return $this->api->success()->message("All Users")->payload($users)->send();
    }

    public function dt(Request $request) {
        return DataTables::eloquent(User::latest())->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $array = $request->sanitizedArray();
        $user = new User($array);
        if (collect($array)->get('password')) {
            $user->password =bcrypt($array["password"]);
        }
        $user->saveOrFail();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, User $user)
    {
        try {
            return $this->api->success()->message("User $user->id")->payload($user)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUser $request, User $user)
    {
        try {
            $data = $request->sanitizedArray();
            $user->update($data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
