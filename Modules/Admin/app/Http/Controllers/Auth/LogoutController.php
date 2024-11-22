<?php

namespace Modules\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Admin\Services\Auth\AdminLogoutService;

class LogoutController extends Controller
{
    public function __construct(protected AdminLogoutService $adminLogoutService)
    {
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        $logout = $this->adminLogoutService->logout();

        if ($logout['success']) {
            return redirect()->route('login')->with('status', $logout['message']);
        }

        return redirect()->back();
    }
}
