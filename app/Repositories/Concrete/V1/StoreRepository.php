<?php

namespace App\Repositories\Concrete\V1;

use App\Enums\StatusEnum;
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

    /**
     * @param Request $request
     * @return void
     */
    public function yajraDatatableOrderBy(Request $request): void
    {
        $order = $request->order[0];
        $columns = ['id', 'id', 'name', 'status', 'created_at'];
        $column = $columns[$order['column']];
        $direction = $order['dir'];
        $this->query->orderBy($column, $direction);
    }

    /**
     * @param $request
     * @return void
     */
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

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
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
            ->addColumn('status', function ($row) {
                return '<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid change-store-status">
                            <input  class="form-check-input" type="checkbox" value="1" data-id="' . $row->id . '"
                                    id="kt_example_switch" ' . ($row->status == StatusEnum::ACTIVE ? 'checked' : '') . '/>
                        </label>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->rawColumns(['status'])
            ->make(true);

        return $data;
    }

    /**
     * @param $ids
     * @return void
     */
    public function deleteMultiple($ids): void
    {
        $this->query->whereIn('id', $ids)->delete();
    }

    /**
     * @param $model
     * @return void
     */
    public function changeStatus($model): void
    {
        $model->status = $model->status == StatusEnum::ACTIVE ? StatusEnum::INACTIVE : StatusEnum::ACTIVE;
        $model->save();
    }

    /**
     * @param array $ids
     * @param $status
     * @return void
     */
    public function changeStatusMultiple($ids, $status)
    {
        $this->query->whereIn('id', $ids)->update(['status' => $status]);
    }
}
