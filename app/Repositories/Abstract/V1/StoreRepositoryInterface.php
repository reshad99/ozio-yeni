<?php

namespace App\Repositories\Abstract\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface StoreRepositoryInterface extends IBaseRepository
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

    /**
     * @param $model
     * @return mixed
     */
    public function changeStatus($model);
}
