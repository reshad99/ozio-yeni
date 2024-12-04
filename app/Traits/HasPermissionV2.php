<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\AdminAccessibleModel;

trait HasPermissionV2
{
    /**
     * Check if the user has permission to access the model.
     * @param Admin $admin
     * @return bool
     */
    public function HasPermissionV2($admin): bool
    {
        return AdminAccessibleModel::where('accessible_type', self::class)
            ->where('admin_id', $admin->id)
            ->whereJsonContains('accessible_id', $this->id)
            ->exists();
    }
}
