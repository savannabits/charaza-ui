<?php


namespace Savannabits\Savadmin\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SavbitsHelper
{
    private $request;
    private $model;
    private $customQuery;
    /**
     *
     * @param Builder |Builder|string $model
     * @param Request|mixed $request
     * @return SavbitsHelper
     */
    public static function listing($model, $request) {
        $instance = new self;
        $instance->request = $request;
        $instance->model = $model;
        return $instance;
    }

    /**
     * @param callable $query
     * @return SavbitsHelper $this
     */
    public function customQuery(callable $query) {
        $this->customQuery = $query;
        return $this;
    }

    /**
     * @return LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function process() {
        $per_page = intval($this->request->get('per_page')) ?? 10;
        $orderBy = $this->request->get('orderBy');
        $orderDirection = $this->request->get('orderDirection');
        $search = $this->request->get('search');
//        $page = $this->request->get('page');

        if (!strlen($orderDirection) || ($orderDirection !=='asc' && $orderDirection !== 'desc')) {
            $orderDirection = 'desc';
        }
        if (!strlen($orderBy)) {
            $orderBy = 'created_at';
            $orderDirection = 'desc';
        }
        if (!!strlen($search)) {
            $results = $this->model::search($search);
            if ($this->customQuery!==null) {
                $results->query($this->customQuery);
            }
            $results = $results->paginate($per_page);
//            \Log::info($results->count());
//            $results = $orderDirection ==='asc' ? $results->sortBy($orderBy) : $results->orderByDesc($orderBy);
//            $results = CollectionHelper::paginate($results->values(), $per_page);
        } else {
            $results = $this->model::getModel();
            if ($this->customQuery!==null) {
                $results = $results->when(true,$this->customQuery);
            }
            $results = $results->orderBy($orderBy, $orderDirection)->paginate($per_page);
        }
        return $results;
    }
}
