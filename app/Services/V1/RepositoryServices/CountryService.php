<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Country;
use App\Repositories\Concrete\V1\CountryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CountryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CountryRepository $countryRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->countryRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Country>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Country> $models
         */
        $models = $this->countryRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->countryRepository->filterBy($filter);
        return $this;
    }
}
