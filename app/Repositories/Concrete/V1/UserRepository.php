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
    ) {
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
        /**
         * @var Builder<User> $query
         */
        $query = $this->query;
        $query->name($request['name'])
            ->email($request['email'])
            ->phone($request['phone'])
            ->bonusCardNo($request['bonus_card_no'])
            ->createdAtBetween($request['startDate'], $request['endDate']);
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
            ->addColumn('bonus_card_no', function ($row) {
                return $row->bonus_card_no;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->make(true);
        return $data;
    }
}
