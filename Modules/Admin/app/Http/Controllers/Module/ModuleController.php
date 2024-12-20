<?php

namespace Modules\Admin\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Services\V1\RepositoryServices\ModuleService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function __construct(private ModuleService $moduleService)
    {
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function moduleSelect2(Request $request)
    {
        $filter = [];
        $filter['name'] = ["operator" => "ILIKE", 'value' => '%' . $request->q . '%'];
        $this->moduleService->setFilter($filter);

        return $this->moduleService->getSelect2(10, $request->page ?? 1);
    }
}
