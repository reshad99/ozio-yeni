<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreProductUpload;
use App\Repositories\Abstract\V1\StoreProductUploadRepositoryInterface;

class StoreProductUploadRepository extends BaseRepository implements StoreProductUploadRepositoryInterface
{
    /**
     * @param StoreProductUpload $model
     */
    public function __construct(
        StoreProductUpload $model
    ) {
        parent::__construct($model);
    }
}
