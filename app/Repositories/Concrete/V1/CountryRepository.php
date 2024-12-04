<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Country;
use App\Repositories\Abstract\V1\CountryRepositoryInterface;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    /**
     * @param Country $model
     */
    public function __construct(
        Country $model
    ) {
        parent::__construct($model);
    }
}
