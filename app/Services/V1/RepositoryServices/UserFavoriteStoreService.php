<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UserFavoriteStore;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UserFavoriteStoreRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserFavoriteStoreService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserFavoriteStoreRepository $userFavoriteStoreRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->userFavoriteStoreRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UserFavoriteStore>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->userFavoriteStoreRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->userFavoriteStoreRepository->filterBy($filter);
        return $this;
    }
}
