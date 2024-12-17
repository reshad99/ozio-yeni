<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Module;
use App\Repositories\Abstract\V1\ModuleRepositoryInterface;

class ModuleRepository extends BaseRepository implements ModuleRepositoryInterface
{
    /**
     * @param Module $model
     */
    public function __construct(
        Module $model
    ) {
        parent::__construct($model);
    }

    public function select2()
    {

    }
}
