<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductType\IndexProductType;
use App\Http\Requests\Api\ProductType\StoreProductType;
use App\Http\Requests\Api\ProductType\UpdateProductType;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Yajra\DataTables\Facades\DataTables;

class ProductTypeController  extends Controller
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
    public function index(IndexProductType $request)
    {
        $query = ProductType::query();
        if ($request->has('search')) {
            $query->whereNotNull('id')
            ->orWhere("id","LIKE","%$request->search%")
            ->orWhere("slug","LIKE","%$request->search%")
            ->orWhere("name","LIKE","%$request->search%")
            ->orWhere("description","LIKE","%$request->search%")
            ;
        }
        $data = $query->paginate($request->get('per_page') ?? 15);
        return $this->api->success()->message("List of ProductTypes")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::eloquent(ProductType::latest())->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductType $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductType $request)
    {
        try {
            $array = $request->sanitizedArray();
            $productType = new ProductType($array);
            $productType->slug = Str::slug($productType->name);
            
            // Save Relationships
            $object = $request->sanitizedObject();
                        

            $productType->saveOrFail();
            return $this->api->success()->message('ProductType Created')->payload($productType)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param ProductType $productType
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, ProductType $productType)
    {
        try {
            //Fetch relationships
                        return $this->api->success()->message("ProductType $productType->id")->payload($productType)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductType $request
     * @param {$modelBaseName} $productType
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductType $request, ProductType $productType)
    {
        try {
            $data = $request->sanitizedArray();
            $productType->update($data);
            $productType->slug = Str::slug($productType->name);
            
            // Save Relationships
                $object = $request->sanitizedObject();
                

            $productType->saveOrFail();
            return $this->api->success()->message("Role has been updated")->payload($productType)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductType $productType
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return $this->api->success()->message("ProductType has been deleted")->payload($productType)->code(200)->send();
    }

}
