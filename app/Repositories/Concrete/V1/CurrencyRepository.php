<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Currency;
use App\Repositories\Abstract\V1\CurrencyRepositoryInterface;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{
    /**
     * @param Currency $model
     */
    public function __construct(
        Currency $model
    ) {
        parent::__construct($model);
    }
}
