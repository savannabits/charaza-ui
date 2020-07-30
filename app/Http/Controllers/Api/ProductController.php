<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\IndexProduct;
use App\Http\Requests\Api\Product\StoreProduct;
use App\Http\Requests\Api\Product\UpdateProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Yajra\DataTables\Facades\DataTables;

class ProductController  extends Controller
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
    public function index(IndexProduct $request)
    {
        $query = Product::query();
        if ($request->has('search')) {
            $query->whereNotNull('id')
            ->orWhere("id","LIKE","%$request->search%")
            ->orWhere("slug","LIKE","%$request->search%")
            ->orWhere("name","LIKE","%$request->search%")
            ->orWhere("description","LIKE","%$request->search%")
            ;
        }
        $data = $query->paginate($request->get('per_page') ?? 15);
        return $this->api->success()->message("List of Products")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::eloquent(Product::latest())->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProduct $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProduct $request)
    {
        try {
            $array = $request->sanitizedArray();
            $product = new Product($array);
            $product->slug = Str::slug($product->name);
            
            // Save Relationships
            $object = $request->sanitizedObject();
            if (isset($object->product_type)) {
                $product->productType()
                    ->associate($object->product_type->id);
            }
                        

            $product->saveOrFail();
            return $this->api->success()->message('Product Created')->payload($product)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Product $product)
    {
        try {
            //Fetch relationships
            $product->load([
            'productType',
        ]);
            return $this->api->success()->message("Product $product->id")->payload($product)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProduct $request
     * @param {$modelBaseName} $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProduct $request, Product $product)
    {
        try {
            $data = $request->sanitizedArray();
            $product->update($data);
            $product->slug = Str::slug($product->name);
            
            // Save Relationships
                $object = $request->sanitizedObject();
            if (isset($object->product_type)) {
                $product->productType()
                    ->associate($object->product_type->id);
            }
                        

            $product->saveOrFail();
            return $this->api->success()->message("Role has been updated")->payload($product)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->api->success()->message("Product has been deleted")->payload($product)->code(200)->send();
    }

}
