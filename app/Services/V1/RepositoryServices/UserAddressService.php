<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UserAddress;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UserAddressRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserAddressService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserAddressRepository $userAddressRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->userAddressRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UserAddress>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->userAddressRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->userAddressRepository->filterBy($filter);
        return $this;
    }
}
