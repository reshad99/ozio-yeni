<?php

namespace App\Repositories\Concrete\V1;

use App\Models\SmsLog;
use App\Repositories\Abstract\V1\SmsLogRepositoryInterface;

class SmsLogRepository extends BaseRepository implements SmsLogRepositoryInterface
{
    /**
     * @param SmsLog $model
     */
    public function __construct(
        SmsLog $model
    ) {
        parent::__construct($model);
    }
}
