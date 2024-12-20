<?php

namespace Modules\Admin\Http\Controllers\StoreCategory;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\StoreCategoryService;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    public function __construct(private StoreCategoryService $storeCategoryService)
    {
    }

    /**
     * @param Request $request
     * @return string
     */
    public function storeCategorySelect2(Request $request)
    {
        $q = $request->q;
        if ($q == '=s=k=i=p=') {
            $q = '';
        }
        $filters = [];
        $filters['name'] = ['operator' => 'ILIKE', 'value' => '%' . $q . '%'];
        $filters['module_id'] = $request->module_id;
        $this->storeCategoryService->setFilter($filters);

        return $this->storeCategoryService->getSelect2(10, $request->page ?? 1);
    }
}
