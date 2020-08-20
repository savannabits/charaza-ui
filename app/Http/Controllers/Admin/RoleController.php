<?php
namespace App\Http\Controllers\Admin;
use App\Models\Permission;
use App\Repos\Permissions;
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
        $this->authorize('roles.index');
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

        return view('backend.roles.index', compact('columns'));
    }
    public function managePermissions(Request  $request) {
        return view('backend.roles.permissions');
    }
}
