<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @return BelongsTo<Module, self>
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * @return BelongsTo<Currency, self>
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * @return BelongsTo<City, self>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsTo<Category, self>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo<Zone, self>
     */
    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    /**
     * @return BelongsTo<StoreBranch, self>
     */
    public function storeBranch(): BelongsTo
    {
        return $this->belongsTo(StoreBranch::class, 'branch_id', 'id');
    }

    /**
     * @return BelongsTo<StoreCategory, self>
     */
    public function storeCategory(): BelongsTo
    {
        return $this->belongsTo(StoreCategory::class);
    }

    /**
     * @return HasMany<UserDevice>
     */
    public function devices(): HasMany
    {
        return $this->hasMany(UserDevice::class);
    }

    /**
     * @return HasMany<Courier>
     */
    public function couriers(): HasMany
    {
        return $this->hasMany(Courier::class);
    }

    /**
     * @return BelongsToMany<User>
     */
    public function favouriteUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_favorite_stores', 'store_id', 'user_id');
    }

    public function cartUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'carts', 'store_id', 'user_id');
    }

    /**
     * @return HasMany<Order>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return HasMany<StoreRating>
     */
    public function storeRatings(): HasMany
    {
        return $this->hasMany(StoreRating::class);
    }
}
