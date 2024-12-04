<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @return BelongsTo<UnitType, self>
     */
    public function unitType(): BelongsTo
    {
        return $this->belongsTo(UnitType::class);
    }

    /**
     * @return HasMany<StoreProduct>
     */
    public function storeProducts(): HasMany
    {
        return $this->hasMany(StoreProduct::class);
    }

    /**
     * @return HasMany<StoreCartItem>
     */
    public function storeCartItem(): HasMany
    {
        return $this->hasMany(StoreCartItem::class);
    }
}
