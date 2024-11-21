<?php

namespace Modules\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\Admin\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function showLogin(): View
    {
        return view('admin::pages.auth.index');
    }

    /**
     * @param AdminLoginRequest $request
     * @return RedirectResponse
     */
    public function authenticate(AdminLoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me');

        if (!Auth::guard('admin')->attempt($credentials, $remember_me)) {
            return redirect()->back()->withErrors(__('admin::general.auth.failed'))->withInput();
        }

        return redirect()->route('admin.dashboard');
    }
}
