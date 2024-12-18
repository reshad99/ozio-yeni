<?php

namespace Modules\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\V1\RepositoryServices\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\Admin\AdminLoginRequest;
use Modules\Admin\Services\Auth\AdminLoginService;

class AdminLoginController extends Controller
{
    public function __construct(
        private AdminLoginService $adminLoginService,
        private UserService $userService
    ) {
    }

    /**
     * @return View
     */
    public function showLogin(): View
    {
        $test = new AdminLoginRequest();
        $this->userService->yajraDatatableExport($test);

        return view('admin::pages.auth.index');
    }

    /**
     * @param AdminLoginRequest $request
     * @return RedirectResponse
     */
    public function authenticate(AdminLoginRequest $request): RedirectResponse
    {
        $login = $this->adminLoginService->login($request);
        if (!$login['success']) {
            return redirect()->back()->withErrors($login['message'])->withInput();
        }

        return redirect()->route('admin.dashboard');
    }
}
