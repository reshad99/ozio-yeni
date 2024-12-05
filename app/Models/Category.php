<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use SoftDeletes;
    use NodeTrait;

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
            'status' => StatusEnum::class,
            'featured' => 'boolean',
        ];
    }

    /**
     * @return BelongsTo<Module, self>
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * @return HasMany<Store>
     */
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    /**
     * @return BelongsToMany<User>
     */
    public function interestedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_interested_categories', 'category_id', 'user_id');
    }


    /**
     * @return HasMany<StoreProduct>
     */
    public function storeProducts(): HasMany
    {
        return $this->hasMany(StoreProduct::class);
    }
}
