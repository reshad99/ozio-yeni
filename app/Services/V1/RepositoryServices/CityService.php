<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\City;
use App\Models\Currency;
use App\Repositories\Concrete\V1\CityRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CityService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CityRepository $cityRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->cityRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<City>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->cityRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->cityRepository->filterBy($filter);
        return $this;
    }
}
