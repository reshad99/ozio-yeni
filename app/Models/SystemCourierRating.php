<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SystemCourierRating extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * @return BelongsTo<Courier, self>
     */
    public function courier(): BelongsTo
    {
        return $this->belongsTo(Courier::class);
    }
}
