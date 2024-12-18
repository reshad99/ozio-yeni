<?php

namespace Modules\Admin\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(protected UserService $userService)
    {
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        return view('admin::pages.users.list.index');
    }


    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function datatable(Request $request)
    {
        return $this->userService->yajraDatatableExport($request);
    }
}
