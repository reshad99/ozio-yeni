<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder|static name()
 * @method static Builder|static query()
 */
class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasRoles;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * @return HasMany<UserAddress>
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    /**
     * @return HasMany<UserNotification>
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(UserNotification::class);
    }

    /**
     * @return HasMany<UserDevice>
     */
    public function devices(): HasMany
    {
        return $this->hasMany(UserDevice::class);
    }

    /**
     * @return BelongsToMany<Category>
     */
    public function interestedCategories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'user_interested_categories', 'user_id', 'category_id');
    }

    /**
     * @return BelongsToMany<Store>
     */
    public function favouriteStores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class, 'user_favorite_stores', 'user_id', 'store_id');
    }

    /**
     * @return BelongsToMany<Coupon>
     */
    public function coupons(): BelongsToMany
    {
        return $this->belongsToMany(Coupon::class, 'assigned_coupons', 'user_id', 'coupon_id');
    }

    /**
     * @return BelongsToMany<StoreProduct>
     */
    public function favouriteStoreProducts(): BelongsToMany
    {
        return $this->belongsToMany(StoreProduct::class, 'user_favorite_store_products', 'user_id', 'store_product_id');
    }

    /**
     * @return HasMany<StoreProductRating>
     */
    public function storeProductRatings(): HasMany
    {
        return $this->hasMany(StoreProductRating::class);
    }


    /**
     * @return BelongsToMany<Store>
     */
    public function favoritedStores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class, 'user_favorite_stores', 'user_id', 'store_id');
    }

    /**
     * @return BelongsToMany<Store>
     */
    public function cartSores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class, 'carts', 'user_id', 'store_id');
    }

    /**
     * @return HasMany<Order>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return HasMany<Otp>
     */
    public function otps(): HasMany
    {
        return $this->hasMany(Otp::class);
    }

    /**
     * Scope a query to filter users by name.
     *
     * @param Builder<User> $query
     * @param string|null $name
     * @return Builder<User>
     */
    public function scopeName($query, $name)
    {
        if (isset($name)) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }

    /**
     * Scope a query to filter users by name.
     *
     * @param Builder<User> $query
     * @param string|null $email
     * @return Builder<User>
     */
    public function scopeEmail($query, $email)
    {
        if (!empty($email)) {
            return $query->where('email', 'like', '%' . $email . '%');
        }
        return $query;
    }

    /**
     * Scope a query to filter users by name.
     *
     * @param Builder<User> $query
     * @param string|null $phone
     * @return Builder<User>
     */
    public function scopePhone($query, $phone)
    {
        if (!empty($phone)) {
            return $query->where('phone', 'like', '%' . $phone . '%');
        }
        return $query;
    }

    /**
     * Scope a query to filter users by name.
     *
     * @param Builder<User> $query
     * @param string|null $bonus_card_no
     * @return Builder<User>
     */
    public function scopeBonusCardNo($query, $bonus_card_no)
    {
        if (!empty($bonus_card_no)) {
            return $query->where('bonus_card_no', 'like', '%' . $bonus_card_no . '%');
        }
        return $query;
    }

    /**
     * Scope a query to filter users by name.
     *
     * @param Builder<User> $query
     * @param string|null $startDate
     * @param string|null $endDate
     * @return Builder<User>
     */
    public function scopeCreatedAtBetween($query, $startDate, $endDate)
    {
        if (!empty($startDate) && !empty($endDate)) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        return $query;
    }
}
