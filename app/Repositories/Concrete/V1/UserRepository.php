<?php

namespace App\Repositories\Concrete\V1;

use App\Models\User;
use App\Repositories\Abstract\V1\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param User $model
     */
    public function __construct(
        User $model
    ) {
        parent::__construct($model);
    }
}
