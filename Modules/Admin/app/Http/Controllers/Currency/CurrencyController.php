<?php

namespace Modules\Admin\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    public function __construct(private CurrencyService $currencyService)
    {
    }

    /**
     * @param Request $request
     * @return string
     */
    public function currencySelect2(Request $request)
    {
        $filter = [];
        $filter['name'] = ["operator" => "ILIKE", 'value' => '%' . $request->q . '%'];
        $this->currencyService->setFilter($filter);

        return $this->currencyService->getSelect2(10, $request->page ?? 1);
    }
}
