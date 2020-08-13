<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DataType\IndexDataType;
use App\Http\Requests\Api\DataType\StoreDataType;
use App\Http\Requests\Api\DataType\UpdateDataType;
use App\Models\DataType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Savannabits\Savadmin\Helpers\SavbitsHelper;
use Yajra\DataTables\Facades\DataTables;

class DataTypeController  extends Controller
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
    public function index(IndexDataType $request)
    {
        $data = $this->helper::listing(DataType::class, $request)->customQuery(function ($builder) use($request) {
        /**@var  DataType|Builder $builder*/
        // Add custom queries here
        })->process();
        return $this->api->success()->message("List of DataTypes")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::of(DataType::query())
            ->addColumn("actions",function($model) {
                $actions = '';
                if (\Auth::user()->can('data-types.show')) $actions .= '<button class="btn btn-outline-primary btn-square action-button mr-2" title="View Details" data-action="show-data-type" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-eye"></i></button>';
                if (\Auth::user()->can('data-types.edit')) $actions .= '<button class="btn btn-outline-warning btn-square action-button mr-2" title="Edit Item" data-action="edit-data-type" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-pencil"></i></button>';
                if (\Auth::user()->can('data-types.delete')) $actions .= '<button class="btn btn-outline-danger btn-square action-button mr-2" title="Delete Item" data-action="delete-data-type" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-delete"></i></button>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDataType $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDataType $request)
    {
        try {
            $array = $request->sanitizedArray();
            $dataType = new DataType($array);
            $dataType->slug = Str::slug($dataType->name);
            
            // Save Relationships
            $object = $request->sanitizedObject();
                        

            $dataType->saveOrFail();
            return $this->api->success()->message('Data Type Created')->payload($dataType)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param DataType $dataType
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, DataType $dataType)
    {
        try {
            //Fetch relationships
                        return $this->api->success()->message("Data Type $dataType->id")->payload($dataType)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDataType $request
     * @param {$modelBaseName} $dataType
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDataType $request, DataType $dataType)
    {
        try {
            $data = $request->sanitizedArray();
            $dataType->update($data);
            $dataType->slug = Str::slug($dataType->name);
            
            // Save Relationships
                $object = $request->sanitizedObject();
                

            $dataType->saveOrFail();
            return $this->api->success()->message("Data Type has been updated")->payload($dataType)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DataType $dataType
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(DataType $dataType)
    {
        $dataType->delete();
        return $this->api->success()->message("Data Type has been deleted")->payload($dataType)->code(200)->send();
    }

}
