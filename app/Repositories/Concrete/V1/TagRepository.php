<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Tag;
use App\Repositories\Abstract\V1\TagRepositoryInterface;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    /**
     * @param Tag $model
     */
    public function __construct(
        Tag $model
    ) {
        parent::__construct($model);
    }
}
