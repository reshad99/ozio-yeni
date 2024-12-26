<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreProductAssignmentPermission;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreProductAssignmentPermissionRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreProductAssignmentPermissionService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreProductAssignmentPermissionRepository $storeProductAssignmentPermissionRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeProductAssignmentPermissionRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreProductAssignmentPermission>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeProductAssignmentPermissionRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeProductAssignmentPermissionRepository->filterBy($filter);
        return $this;
    }
}
