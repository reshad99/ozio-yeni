<?php

namespace Modules\Admin\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct(private CountryService $countryService)
    {
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function countrySelect2(Request $request)
    {
        $filter = [];
        $filter['name'] = ["operator" => "ILIKE", 'value' => '%' . $request->q . '%'];
        $this->countryService->setFilter($filter);

        return $this->countryService->getSelect2(10, $request->page ?? 1);
    }
}
