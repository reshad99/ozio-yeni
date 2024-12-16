<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Store;
use App\Repositories\Abstract\V1\StoreRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{
    /**
     * @param Store $model
     */
    public function __construct(
        Store $model
    )
    {
        parent::__construct($model);
    }

    public function yajraDatatableOrderBy(Request $request): void
    {
        $order = $request->order[0];
        $columns = ['id', 'id', 'name', 'email', 'phone', 'created_at'];
        $column = $columns[$order['column']];
        $direction = $order['dir'];
        $this->query->orderBy($column, $direction);
    }

    public function yajraDatatableSearch($request): void
    {
        $request = (object)$request;
        /**
         * @var Builder<Store> $query
         */
        $query = $this->query;

        $query->module($request->module_id)
            ->name($request->name)
            ->storeCode($request->store_code)
            ->currency($request->currency_id)
            ->phone($request->phone)
            ->city($request->city_id)
            ->email($request->email)
            ->deviceId($request->device_id)
            ->latLong($request->lat, $request->long)
            ->status($request->status)
            ->openAndCloseTime($request->open_time, $request->close_time)
            ->zone($request->zone_id)
            ->branch($request->branch_id);
    }

    public function yajraDatatableExport(Request $request): JsonResponse
    {
        if ($request->has('filters'))
            $this->yajraDatatableSearch($request->filters);

        if ($request->has('order'))
            $this->yajraDatatableOrderBy($request);

        $data = DataTables::of($this->query)
            ->addColumn('recordId', function ($row) {
                return $row->id;
            })
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('phone', function ($row) {
                return $row->phone;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->make(true);

        return $data;
    }

    public function deleteMultiple($ids): void
    {
        $this->query->whereIn('id', $ids)->delete();
    }
}
