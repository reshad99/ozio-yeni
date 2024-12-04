<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreBranch extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @return HasMany<Store>
     */
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class, 'branch_id', 'id');
    }

    /**
     * @return BelongsToMany<StoreProduct>
     */
    public function storeProducts(): BelongsToMany
    {
        return $this->belongsToMany(StoreProduct::class, 'store_product_assignment_permissions', 'store_branch_id', 'store_product_id');
    }
}
