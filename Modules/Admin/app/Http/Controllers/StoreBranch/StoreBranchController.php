<?php

namespace Modules\Admin\Http\Controllers\StoreBranch;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\StoreBranchService;
use Illuminate\Http\Request;

class StoreBranchController extends Controller
{
    public function __construct(private StoreBranchService $storeBranchService)
    {
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeBranchSelect2(Request $request)
    {
        $filter = [];
        $filter['name'] = ["operator" => "ILIKE", 'value' => '%' . $request->q . '%'];
        $this->storeBranchService->setFilter($filter);

        return $this->storeBranchService->getSelect2(10, $request->page ?? 1);
    }
}
