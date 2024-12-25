<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Courier;
use App\Models\Currency;
use App\Repositories\Concrete\V1\CourierRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CourierService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CourierRepository $courierRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->courierRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Courier>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->courierRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->courierRepository->filterBy($filter);
        return $this;
    }
}
