<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    protected $casts = [
        'status' => StatusEnum::class
    ];

    /**
     * @return BelongsTo<Category, self>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo<Unit, self>
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * @return BelongsToMany<User>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assigned_products', 'product_id', 'user_id');
    }

    /**
     * @return BelongsToMany<Tag>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'store_product_tags', 'store_product_id', 'tag_id');
    }

    /**
     * @return HasMany<StoreProductRating>
     */
    public function storeProductRatings(): HasMany
    {
        return $this->hasMany(StoreProductRating::class);
    }

    /**
     * @return HasMany<StoreProductBarcode>
     */
    public function storeProductBarcodes(): HasMany
    {
        return $this->hasMany(StoreProductBarcode::class);
    }

    /**
     * @return BelongsToMany<StoreBranch>
     */
    public function storeBranchs(): BelongsToMany
    {
        return $this->belongsToMany(StoreBranch::class, 'store_product_assignment_permissions', 'store_product_id', 'store_branch_id');
    }

    /**
     * @return BelongsToMany<Cart>
     */
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'store_cart_items', 'store_product_id', 'cart_id');
    }

    /**
     * @return HasMany<StoreProductUpload>
     */
    public function storeProductUploads(): HasMany
    {
        return $this->hasMany(StoreProductUpload::class);
    }
}
