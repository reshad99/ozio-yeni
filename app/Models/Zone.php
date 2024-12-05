<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Enums\ZoneTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use SoftDeletes;

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
            'type' => ZoneTypeEnum::class,
            'status' => StatusEnum::class
        ];
    }

    /**
     * @return HasMany<ZonePricing>
     */
    public function zonePricings(): HasMany
    {
        return $this->hasMany(ZonePricing::class);
    }

    /**
     * @return HasMany<Store>
     */
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    /**
     * @return BelongsToMany<Module>
     */
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'modules_zones', 'zone_id', 'module_id');
    }

    /**
     * @return HasMany<UserAddress>
     */
    public function user_addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }
}
