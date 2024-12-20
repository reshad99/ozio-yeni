<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Currency;
use App\Models\StoreCategory;
use App\Repositories\Concrete\V1\StoreCategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreCategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreCategoryRepository $storeCategoryRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeCategoryRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreCategory>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeCategoryRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeCategoryRepository->filterBy($filter);
        return $this;
    }
}
