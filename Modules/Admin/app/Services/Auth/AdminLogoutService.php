<?php

namespace Modules\Admin\Services\Auth;

use Illuminate\Support\Facades\Auth;

class AdminLogoutService
{
    /**
     * Handle admin logout process.
     *
     * @return array<string,bool>
     */
    public function logout(): array
    {
        Auth::guard('admin')->logout();

        return [
            'success' => true,
        ];
    }
}
