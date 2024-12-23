<?php

namespace Modules\Admin\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\V1\RepositoryServices\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\User\StoreUserRequest;

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

    /**
     * @param StoreUserRequest $request
     * @return User
     */
    public function store(StoreUserRequest $request)
    {
        return $this->userService->createUser($request);
    }
}
