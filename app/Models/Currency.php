<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
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
            'status' => StatusEnum::class
        ];
    }

    /**
     * @return HasMany<Tip>
     */
    public function tips(): HasMany
    {
        return $this->hasMany(Tip::class);
    }

    /**
     * @return HasMany<Store>
     */
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    /**
     * @return HasMany<ZonePricing>
     */
    public function zonePricings(): HasMany
    {
        return $this->hasMany(ZonePricing::class);
    }
}
