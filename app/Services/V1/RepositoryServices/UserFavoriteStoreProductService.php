<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UserFavoriteStoreProduct;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UserFavoriteStoreProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserFavoriteStoreProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserFavoriteStoreProductRepository $userFavoriteStoreProductRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->userFavoriteStoreProductRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UserFavoriteStoreProduct>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->userFavoriteStoreProductRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->userFavoriteStoreProductRepository->filterBy($filter);
        return $this;
    }
}
