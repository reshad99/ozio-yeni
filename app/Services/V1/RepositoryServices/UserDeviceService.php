<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UserDevice;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UserDeviceRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserDeviceService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserDeviceRepository $userDeviceRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->userDeviceRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UserDevice>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->userDeviceRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->userDeviceRepository->filterBy($filter);
        return $this;
    }
}
