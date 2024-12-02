<?php

namespace App\Repositories\Abstract\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

interface UserRepositoryInterface extends IBaseRepository
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function yajraDatatableExport(Request $request): JsonResponse;
    /**
     * @param array<string,string> $filters
     * @return void
     */
    public function yajraDatatableSearch($filters): void;
    /**
     * @param Request $request
     * @return void
     */
    public function yajraDatatableOrderBy(Request $request): void;
}
