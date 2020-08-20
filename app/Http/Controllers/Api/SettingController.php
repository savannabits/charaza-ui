<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Setting\IndexSetting;
use App\Http\Requests\Api\Setting\StoreSetting;
use App\Http\Requests\Api\Setting\UpdateSetting;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Savannabits\Savadmin\Helpers\SavbitsHelper;
use Yajra\DataTables\Facades\DataTables;

class SettingController  extends Controller
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
    public function index(IndexSetting $request)
    {
        $data = $this->helper::listing(Setting::class, $request)->customQuery(function ($builder) use($request) {
        /**@var  Setting|Builder $builder*/
        // Add custom queries here
        })->process();
        return $this->api->success()->message("List of Settings")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::of(Setting::query())
            ->addColumn("actions",function($model) {
                $actions = '';
                if (\Auth::user()->can('settings.show')) $actions .= '<button class="btn btn-outline-primary btn-square action-button mr-2" title="View Details" data-action="show-setting" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-eye"></i></button>';
                if (\Auth::user()->can('settings.edit')) $actions .= '<button class="btn btn-outline-warning btn-square action-button mr-2" title="Edit Item" data-action="edit-setting" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-pencil"></i></button>';
                if (\Auth::user()->can('settings.delete')) $actions .= '<button class="btn btn-outline-danger btn-square action-button mr-2" title="Delete Item" data-action="delete-setting" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-delete"></i></button>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSetting $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSetting $request)
    {
        try {
            $array = $request->sanitizedArray();
            $setting = new Setting($array);
            $setting->slug = Str::slug($setting->name);
            
            // Save Relationships
            $object = $request->sanitizedObject();
            if (isset($object->data_type)) {
                $setting->dataType()
                    ->associate($object->data_type->id);
            }
                        

            $setting->saveOrFail();
            return $this->api->success()->message('Setting Created')->payload($setting)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Setting $setting
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Setting $setting)
    {
        try {
            //Fetch relationships
            $setting->load([
            'dataType',
        ]);
            return $this->api->success()->message("Setting $setting->id")->payload($setting)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSetting $request
     * @param {$modelBaseName} $setting
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSetting $request, Setting $setting)
    {
        try {
            $data = $request->sanitizedArray();
            $setting->update($data);
            $setting->slug = Str::slug($setting->name);
            
            // Save Relationships
                $object = $request->sanitizedObject();
            if (isset($object->data_type)) {
                $setting->dataType()
                    ->associate($object->data_type->id);
            }
                        

            $setting->saveOrFail();
            return $this->api->success()->message("Setting has been updated")->payload($setting)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return $this->api->success()->message("Setting has been deleted")->payload($setting)->code(200)->send();
    }

}
