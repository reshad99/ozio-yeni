<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Builder;
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
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'status' => StatusEnum::class,
            'have_vegan' => 'boolean',
            'have_not_vegan' => 'boolean',
            'open_time' => 'datetime',
            'close_time' => 'datetime',
        ];
    }

    protected $hidden = [
        'password',
    ];

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

    /**
     * @return BelongsToMany<User>
     */
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

    /**
     * @param Builder $query
     * @param int $moduleId
     * @return Builder<self>
     */
    public function scopeModule($query, $moduleId)
    {
        if (isset($moduleId))
            return $query->where('module_id', $moduleId);

        return $query;
    }

    /**
     * @param Builder $query
     * @param string $name
     * @return Builder<self>
     */
    public function scopeName($query, $name)
    {
        if (isset($name))
            return $query->where('name', 'like', '%' . $name . '%');

        return $query;
    }

    /**
     * @param Builder $query
     * @param string $storeCode
     * @return Builder<self>
     */
    public function scopeStoreCode($query, $storeCode)
    {
        if (isset($storeCode))
            return $query->where('store_code', 'like', '%' . $storeCode . '%');

        return $query;
    }

    public function scopeCurrency($query, $currencyId)
    {
        if (isset($currencyId))
            return $query->where('currency_id', $currencyId);

        return $query;
    }

    public function scopePhone($query, $phone)
    {
        if (isset($phone))
            return $query->where('phone', 'like', '%' . $phone . '%');

        return $query;
    }

    public function scopeCity($query, $cityId)
    {
        if (isset($cityId))
            return $query->where('city_id', $cityId);

        return $query;
    }

    public function scopeEmail($query, $email)
    {
        if (isset($email))
            return $query->where('email', 'like', '%' . $email . '%');

        return $query;
    }

    public function scopeDeviceId($query, $deviceId)
    {
        if (isset($deviceId))
            return $query->where('device_id', 'like', '%' . $deviceId . '%');

        return $query;
    }

    public function scopeLatLong($query, $lat, $long)
    {
        if (isset($lat) && isset($long))
            return $query->where('lat', $lat)->where('long', $long);

        return $query;
    }

    public function scopeStatus($query, $status)
    {
        if (isset($status))
            return $query->where('status', $status);

        return $query;
    }

    public function scopeOpenAndCloseTime($query, $openTime, $closeTime)
    {
        if (isset($openTime) && isset($closeTime))
            return $query->where('open_time', $openTime)->where('close_time', $closeTime);
    }

    public function scopeZone($query, $zoneId)
    {
        if (isset($zoneId))
            return $query->where('zone_id', $zoneId);

        return $query;
    }

    public function scopeBranch($query, $branchId)
    {
        if (isset($branchId))
            return $query->where('branch_id', $branchId);

        return $query;
    }
}
