<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UserAddress;
use App\Repositories\Abstract\V1\UserAddressRepositoryInterface;

class UserAddressRepository extends BaseRepository implements UserAddressRepositoryInterface
{
    /**
     * @param UserAddress $model
     */
    public function __construct(
        UserAddress $model
    ) {
        parent::__construct($model);
    }
}
