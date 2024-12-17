<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Module;
use App\Models\User;
use App\Repositories\Abstract\V1\ModuleRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ModuleService
{
    /**
     * Create a new class instance.
     * @param ModuleRepositoryInterface $moduleRepository
     */
    public function __construct(private ModuleRepositoryInterface $moduleRepository)
    {
    }

    public function getSelect2($perPage,$page)
    {
        return $this->moduleRepository->getSelect2($perPage, $page, 'id', 'name');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<User>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Module> $models
         */
        $models = $this->moduleRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->moduleRepository->filterBy($filter);
        return $this;
    }
}
