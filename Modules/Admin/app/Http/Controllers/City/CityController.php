<?php

namespace Modules\Admin\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct(private CityService $cityService)
    {
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function citySelect2(Request $request)
    {
        $q = $request->q;
        if ($q == '=s=k=i=p=') {
            $q = '';
        }
        $filter = [];
        $filter['name'] = ["operator" => "ILIKE", 'value' => '%' . $q . '%'];
        $filter['country_id'] = $request->country_id;
        $this->cityService->setFilter($filter);

        return $this->cityService->getSelect2(10, $request->page ?? 1);
    }
}
