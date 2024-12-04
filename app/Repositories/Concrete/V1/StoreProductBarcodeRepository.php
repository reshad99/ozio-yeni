<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreProductBarcode;
use App\Repositories\Abstract\V1\StoreProductBarcodeRepositoryInterface;

class StoreProductBarcodeRepository extends BaseRepository implements StoreProductBarcodeRepositoryInterface
{
    /**
     * @param StoreProductBarcode $model
     */
    public function __construct(
        StoreProductBarcode $model
    ) {
        parent::__construct($model);
    }
}
