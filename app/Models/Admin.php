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


    //SCOPES

    /**
     * Scope a query to filter users by name.
     *
     * @param Builder<Admin> $query
     * @param string|null $name
     * @return Builder<Admin>
     */
    public function scopeName($query, $name)
    {
        if (isset($name)) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }

    //email,phone,createdAtBetween scopes

    /**
     * Scope a query to filter users by email.
     *
     * @param Builder<Admin> $query
     * @param string|null $email
     * @return Builder<Admin>
     */
    public function scopeEmail($query, $email)
    {
        if (isset($email)) {
            return $query->where('email', 'like', '%' . $email . '%');
        }
        return $query;
    }

    /**
     * Scope a query to filter users by phone.
     *
     * @param Builder<Admin> $query
     * @param string|null $phone
     * @return Builder<Admin>
     */
    public function scopePhone($query, $phone)
    {
        if (isset($phone)) {
            return $query->where('phone', 'like', '%' . $phone . '%');
        }
        return $query;
    }

    /**
     * Scope a query to filter users by created_at between.
     *
     * @param Builder<Admin> $query
     * @param string|null $startDate
     * @param string|null $endDate
     * @return Builder<Admin>
     */
    public function scopeCreatedAtBetween($query, $startDate, $endDate)
    {
        if (isset($startDate) && isset($endDate)) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        return $query;
    }

    
}
