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

    public function currencySelect2(Request $request)
    {
        $filter = [];
        $filter['name'] = ["operator" => "LIKE", 'value' => '%' . $request->q . '%'];
        $this->currencyService->setFilter($filter);

        return $this->currencyService->getSelect2(10, $request->page ?? 1);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
