<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class LoanController extends Controller
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
                "data" => "borrowed_at",
                "name" => "borrowed_at",
                "title" => "Borrowed At"
            ],
            [
                "data" => "amount",
                "name" => "amount",
                "title" => "Amount"
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
                "event" => "show-loan",
                "classes" => "btn btn-secondary rounded-0"
            ],
            [
                "tag" => "button",
                "href" => "",
                "title" => "edit",
                "icon" => "mdi mdi-pencil",
                "event" => "edit-loan",
                "classes" => "btn btn-primary rounded-0"
            ],
        ];
        return view('backend.loans.index', compact('columns', 'actions'));
    }
}
