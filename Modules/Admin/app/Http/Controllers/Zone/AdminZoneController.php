<?php

namespace Modules\Admin\Http\Controllers\Zone;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\ZoneService;
use Illuminate\Http\Request;

class AdminZoneController extends Controller
{
    public function __construct(private ZoneService $zoneService)
    {
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function zoneSelect2(Request $request)
    {
        $filter = [];
        $filter['name'] = ["operator" => "ILIKE", 'value' => '%' . $request->q . '%'];
        $this->zoneService->setFilter($filter);

        return $this->zoneService->getSelect2(10, $request->page ?? 1);
    }
}
