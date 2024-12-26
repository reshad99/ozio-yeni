<?php

namespace App\Repositories\Concrete\V1;

use App\Models\User;
use App\Repositories\Abstract\V1\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param User $model
     */
    public function __construct(
        User $model
    )
    {
        parent::__construct($model);
    }

    /** {@inheritDoc} */
    public function yajraDatatableOrderBy(Request $request): void
    {
        $order = $request->order[0]; // order parametersindeki ilk elemanı alır
        $columns = ['id', 'id', 'name', 'email', 'phone', 'bonus_card_no', 'created_at'];
        $column = $columns[$order['column']];
        $direction = $order['dir'];
        $this->query->orderBy($column, $direction);
    }

    /** {@inheritDoc} */
    public function yajraDatatableSearch($request): void
    {
        $request = (object)$request;
        /**
         * @var Builder<User> $query
         */
        $query = $this->query;

        if (isset($request->name) && !empty($request->name)) {
            $query->name($request->name);
        }

        if (isset($request->email) && !empty($request->email)) {
            $query->email($request->email);
        }

        if (isset($request->phone) && !empty($request->phone)) {
            $query->phone($request->phone);
        }

        if (isset($request->bonus_card_no) && !empty($request->bonus_card_no)) {
            $query->bonusCardNo($request->bonus_card_no);
        }

        if (isset($request->date_start) && !empty($request->date_start) &&
            isset($request->date_end) && !empty($request->date_end)) {
            $query->createdAtBetween($request->date_start, $request->date_end);
        }
    }

    /** {@inheritDoc} */
    public
    function yajraDatatableExport(Request $request): JsonResponse
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
            ->addColumn('bonus_card_no', function ($row) {
                return $row->bonus_card_no;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->make(true);
        return $data;
    }

    /**
     * @param array $ids
     * @return void
     */
    public
    function deleteMultiple($ids): void
    {
        $this->query->whereIn('id', $ids)->delete();
    }
}
