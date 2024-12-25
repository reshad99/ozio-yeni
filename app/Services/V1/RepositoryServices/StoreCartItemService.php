<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreCartItem;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreCartItemRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreCartItemService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreCartItemRepository $storeCartItemRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeCartItemRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreCartItem>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeCartItemRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeCartItemRepository->filterBy($filter);
        return $this;
    }
}
