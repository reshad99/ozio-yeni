<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Courier extends Model
{
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
            'status' => StatusEnum::class
        ];
    }

    /**
     * @var array<string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return BelongsTo<Store, self>
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return HasMany<SystemCourierRating>
     */
    public function systemCourierRatings(): HasMany
    {
        return $this->hasMany(SystemCourierRating::class);
    }

    /**
     * @return HasMany<Order>
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return HasMany<CourierRating>
     */
    public function courierRating(): HasMany
    {
        return $this->hasMany(CourierRating::class);
    }
}
