<?php

namespace App\Models;

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
     * @return HasMany<ZonePricing>
     */
    public function zonePricing(): HasMany
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
}
