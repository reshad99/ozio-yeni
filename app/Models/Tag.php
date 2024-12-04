<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
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
        return $this->belongsToMany(StoreProduct::class, 'store_product_tags', 'tag_id', 'store_product_id');
    }
}
