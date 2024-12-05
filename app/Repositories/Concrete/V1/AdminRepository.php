<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Admin;
use App\Repositories\Abstract\V1\AdminRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    /**
     * @param Admin $model
     */
    public function __construct(
        Admin $model
    ) {
        parent::__construct($model);
    }

    /** {@inheritDoc} */
    public function yajraDatatableOrderBy(Request $request): void
    {
        $order = $request->order[0]; // order parametersindeki ilk elemanı alır
        $columns = ['id', 'id', 'name', 'email', 'phone', 'created_at'];
        $column = $columns[$order['column']];
        $direction = $order['dir'];
        $this->query->orderBy($column, $direction);
    }

    /** {@inheritDoc} */
    public function yajraDatatableSearch($request): void
    {
        $request = (object)$request;
        /**
         * @var Builder<Admin> $query
         */
        $query = $this->query;

        $query->name($request->name)
            ->email($request->email)
            ->phone($request->phone)
            ->createdAtBetween($request->created_at_start, $request->created_at_end);
    }

    /** {@inheritDoc} */
    public function yajraDatatableExport(Request $request): JsonResponse
    {
        if ($request->has('filters')) {
            $this->yajraDatatableSearch($request->filters);
        }
        if ($request->has('order')) {
            $this->yajraDatatableOrderBy($request);
        }

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
}
