<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Role\IndexRole;
use App\Http\Requests\Api\Role\StoreRole;
use App\Http\Requests\Api\Role\UpdateRole;
use App\Models\Permission;
use App\Models\Role;
use App\Repos\Permissions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Savannabits\Savadmin\Helpers\SavbitsHelper;
use Yajra\DataTables\Facades\DataTables;

class RoleController  extends Controller
{
    private $api, $helper;
    public function __construct(ApiResponse $apiResponse, SavbitsHelper $helper)
    {
        $this->api = $apiResponse;
        $this->helper = $helper;
    }

    /**
     * Display a listing of the resource (paginated).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRole $request)
    {
        $data = $this->helper::listing(Role::class, $request)->customQuery(function ($builder) use($request) {
        /**@var  Role|Builder $builder*/
        // Add custom queries here
        })->process();
        return $this->api->success()->message("List of Roles")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::of(Role::query())
            ->addColumn("actions",function($model) {
                $actions = '';
                if (\Auth::user()->can('roles.show')) $actions .= '<button class="btn btn-outline-primary btn-square action-button mr-2" title="View Details" data-action="show-role" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-eye"></i></button>';
                if (\Auth::user()->can('roles.edit')) $actions .= '<button class="btn btn-outline-warning btn-square action-button mr-2" title="Edit Item" data-action="edit-role" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-pencil"></i></button>';
                if (\Auth::user()->can('roles.delete')) $actions .= '<button class="btn btn-outline-danger btn-square action-button mr-2" title="Delete Item" data-action="delete-role" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-delete"></i></button>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRole $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRole $request)
    {
        try {
            $array = $request->sanitizedArray();
            $role = new Role($array);
            $role->slug = Str::slug($role->name);

            // Save Relationships
            $object = $request->sanitizedObject();


            $role->saveOrFail();
            return $this->api->success()->message('Role Created')->payload($role)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Role $role)
    {
        try {
            if ($request->input('with-perms')) {
                $perms = Permissions::getRolePermissionMatrix($role);
                $role->permissions_matrix = $perms;
            }
           return $this->api->success()->message("Role $role->id")->payload($role)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRole $request
     * @param {$modelBaseName} $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRole $request, Role $role)
    {
        try {
            $data = $request->sanitizedArray();
            $role->update($data);
            $role->slug = Str::slug($role->display_name);

            // Save Relationships
                $object = $request->sanitizedObject();


            $role->saveOrFail();
            return $this->api->success()->message("Role has been updated")->payload($role)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return $this->api->success()->message("Role has been deleted")->payload($role)->code(200)->send();
    }
    public function togglePermission(Request  $request, Role  $role) {
        $request->validate([
            "permission_id" => "required|integer",
            "assigned" => "required|boolean"
        ]);
        try {
            $perm = Permission::findOrFail($request->permission_id);
            if ($request->assigned) {
                $role->givePermissionTo($perm->name);
            } else {
                if ($role->hasPermissionTo($perm->name)) $role->revokePermissionTo($perm->name);
            }
            return $this->api->success()->message("Permission $perm->name toggled")->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->code(400)->send();
        }
    }

}
