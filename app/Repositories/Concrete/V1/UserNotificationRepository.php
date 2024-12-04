<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UserNotification;
use App\Repositories\Abstract\V1\UserNotificationRepositoryInterface;

class UserNotificationRepository extends BaseRepository implements UserNotificationRepositoryInterface
{
    /**
     * @param UserNotification $model
     */
    public function __construct(
        UserNotification $model
    ) {
        parent::__construct($model);
    }
}
