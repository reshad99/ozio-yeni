<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Setting;
use App\Repositories\Abstract\V1\SettingRepositoryInterface;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    /**
     * @param Setting $model
     */
    public function __construct(
        Setting $model
    ) {
        parent::__construct($model);
    }
}
