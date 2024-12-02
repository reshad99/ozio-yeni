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
        $columns = ['id']; // Define columns
        $column = $columns[$order['column']];
        $direction = $order['dir'];
        $this->query->orderBy($column, $direction);
    }
    /** {@inheritDoc} */
    public function yajraDatatableSearch($request): void
    {
        $this->query->name($request['name']);
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
            ->addIndexColumn()
            ->make(true);
        return $data;
    }
}
