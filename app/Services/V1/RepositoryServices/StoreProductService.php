<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreProduct;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreProductRepository $storeProductRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeProductRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreProduct>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeProductRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeProductRepository->filterBy($filter);
        return $this;
    }
}
