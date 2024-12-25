<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Unit;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UnitRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UnitService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UnitRepository $unitRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->unitRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Unit>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->unitRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->unitRepository->filterBy($filter);
        return $this;
    }
}
