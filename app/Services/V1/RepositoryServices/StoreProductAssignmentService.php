<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreProductAssignment;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreProductAssignmentRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreProductAssignmentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreProductAssignmentRepository $storeProductAssignmentRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeProductAssignmentRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreProductAssignment>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeProductAssignmentRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeProductAssignmentRepository->filterBy($filter);
        return $this;
    }
}
