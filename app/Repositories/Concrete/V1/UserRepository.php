<?php

namespace App\Repositories\Concrete\V1;

use App\Models\User;
use App\Repositories\Abstract\V1\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

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
    
    public function yajraDatatableOrderBy($request): void
    {
        $order = $request->order[0]; // order parametersindeki ilk elemanı alır
        $columns = ['id']; // Define columns
        $column = $columns[$order['column']];
        $direction = $order['dir'];
        $this->query->orderBy($column, $direction);
    }
    public function yajraDatatableSearch($request): void
    {
        $this->query->name($request['name']);
    }
    public function yajraDatatableExport($request): JsonResponse
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
