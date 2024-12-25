<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreDevice;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreDeviceRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreDeviceService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreDeviceRepository $storeDeviceRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeDeviceRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreDevice>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeDeviceRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeDeviceRepository->filterBy($filter);
        return $this;
    }
}
