<?php

namespace Modules\Admin\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\AdminLoginRequest;

class AdminLoginService
{
    /**
     * @param AdminLoginRequest $request
     * @return array<bool,string>|true[]
     */
    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me');

        if (!Auth::guard('admin')->attempt($credentials, $remember_me)) {
            return [
                'success' => false,
                'message' => __('admin::general.auth.failed'),
            ];
        }

        return [
            'success' => true,
        ];
    }
}
