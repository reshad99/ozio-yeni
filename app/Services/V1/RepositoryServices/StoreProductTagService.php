<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreProductTag;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreProductTagRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreProductTagService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreProductTagRepository $storeProductTagRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeProductTagRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreProductTag>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeProductTagRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeProductTagRepository->filterBy($filter);
        return $this;
    }
}
