<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UnitType;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UnitTypeRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UnitTypeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UnitTypeRepository $unitTypeRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->unitTypeRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UnitType>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->unitTypeRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->unitTypeRepository->filterBy($filter);
        return $this;
    }
}
