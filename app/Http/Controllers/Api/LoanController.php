<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Loan\IndexLoan;
use App\Http\Requests\Api\Loan\StoreLoan;
use App\Http\Requests\Api\Loan\UpdateLoan;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Yajra\DataTables\Facades\DataTables;

class LoanController  extends Controller
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
    public function index(IndexLoan $request)
    {
        $query = Loan::query();
        if ($request->has('search')) {
            $query->whereNotNull('id')
            ->orWhere("id","LIKE","%$request->search%")
            ;
        }
        $data = $query->paginate($request->get('per_page') ?? 15);
        return $this->api->success()->message("List of Loans")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::eloquent(Loan::latest())->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLoan $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreLoan $request)
    {
        try {
            $array = $request->sanitizedArray();
            $loan = new Loan($array);
            
            // Save Relationships
            $object = $request->sanitizedObject();
            if (isset($object->borrower)) {
                $loan->borrower()
                    ->associate($object->borrower->id);
            }
if (isset($object->lender)) {
                $loan->lender()
                    ->associate($object->lender->id);
            }
if (isset($object->product)) {
                $loan->product()
                    ->associate($object->product->id);
            }
                        

            $loan->saveOrFail();
            return $this->api->success()->message('Loan Created')->payload($loan)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Loan $loan
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Loan $loan)
    {
        try {
            //Fetch relationships
            $loan->load([
            'borrower',
            'lender',
            'product',
        ]);
            return $this->api->success()->message("Loan $loan->id")->payload($loan)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLoan $request
     * @param {$modelBaseName} $loan
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateLoan $request, Loan $loan)
    {
        try {
            $data = $request->sanitizedArray();
            $loan->update($data);
            
            // Save Relationships
                $object = $request->sanitizedObject();
            if (isset($object->borrower)) {
                $loan->borrower()
                    ->associate($object->borrower->id);
            }
        if (isset($object->lender)) {
                $loan->lender()
                    ->associate($object->lender->id);
            }
        if (isset($object->product)) {
                $loan->product()
                    ->associate($object->product->id);
            }
                        

            $loan->saveOrFail();
            return $this->api->success()->message("Role has been updated")->payload($loan)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Loan $loan
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return $this->api->success()->message("Loan has been deleted")->payload($loan)->code(200)->send();
    }

}
