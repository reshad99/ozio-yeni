<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Currency;
use App\Models\StoreCategory;
use App\Repositories\Concrete\V1\ZoneRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ZoneService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private ZoneRepository $zoneRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->zoneRepository->getSelect2($perPage, $page, 'name', 'id');
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
        $models = $this->zoneRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->zoneRepository->filterBy($filter);
        return $this;
    }
}
