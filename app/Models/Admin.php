<?php

namespace App\Models;

use App\Traits\HasPermissionV2;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasPermissionV2;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }

    /**
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @param string $class
     * @param int $id
     * @return bool
     */
    public function canPermission($class, $id): bool
    {
        return AdminAccessibleModel::where('admin_id', $this->id)
            ->where('accessible_type', $class)
            ->whereJsonContains('accessible_id', $id)
            ->exists();
    }
}
