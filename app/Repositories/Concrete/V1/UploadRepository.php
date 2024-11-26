<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Upload;
use App\Repositories\Abstract\V1\UploadRepositoryInterface;

class UploadRepository extends BaseRepository implements UploadRepositoryInterface
{
    /**
     * @param Upload $model
     */
    public function __construct(
        Upload $model
    ) {
        parent::__construct($model);
    }
}
