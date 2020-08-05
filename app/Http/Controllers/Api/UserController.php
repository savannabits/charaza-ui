<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\IndexUser;
use App\Http\Requests\Api\User\StoreUser;
use App\Http\Requests\Api\User\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Yajra\DataTables\Facades\DataTables;

class UserController  extends Controller
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
    public function index(IndexUser $request)
    {
        $query = User::query();
        if ($request->has('search')) {
            $query->whereNotNull('id')
            ->orWhere("id","LIKE","%$request->search%")
            ->orWhere("username","LIKE","%$request->search%")
            ->orWhere("email","LIKE","%$request->search%")
            ->orWhere("name","LIKE","%$request->search%")
            ->orWhere("first_name","LIKE","%$request->search%")
            ->orWhere("middle_name","LIKE","%$request->search%")
            ->orWhere("last_name","LIKE","%$request->search%")
            ;
        }
        $data = $query->paginate($request->get('per_page') ?? 15);
        return $this->api->success()->message("List of Users")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::eloquent(User::latest())->make();
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
            if (isset($array["password"])) {
                $user->password = bcrypt($array["password"]);
            }
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
            if (isset($data["password"])) {
                $user->password = bcrypt($data["password"]);
            }

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
