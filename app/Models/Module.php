<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @return HasMany<StoreCategory,self>
     */
    public function storeCategories(): HasMany
    {
        return $this->hasMany(StoreCategory::class);
    }

    /**
     * @return HasMany<Store,self>
     */
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    /**
     * @return BelongsToMany<Zone,self>
     */
    public function zones(): BelongsToMany
    {
        return $this->belongsToMany(Zone::class, 'modules_zones', 'module_id', 'zone_id');
    }

    /**
     * @return HasMany<Category,self>
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
