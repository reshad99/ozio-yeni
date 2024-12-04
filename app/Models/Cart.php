<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @return BelongsToMany<StoreProduct>
     */
    public function storeProducts(): BelongsToMany
    {
        return $this->belongsToMany(StoreProduct::class, 'store_cart_items', 'cart_id', 'store_product_id');
    }
}
