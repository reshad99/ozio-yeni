<?php

namespace App\Repositories\Abstract\V1;

use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

interface UserRepositoryInterface extends IBaseRepository
{
    // yajraDatatableExport,yajraDatatableSearch,yajraDatatableOrderBy
    public function yajraDatatableExport($request): JsonResponse;
    public function yajraDatatableSearch($request): void;
    public function yajraDatatableOrderBy($request): void;
}
