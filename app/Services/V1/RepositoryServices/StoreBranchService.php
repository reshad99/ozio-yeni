<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreBranch;
use App\Repositories\Concrete\V1\StoreBranchRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreBranchService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreBranchRepository $storeBranchRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeBranchRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreBranch>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<StoreBranch> $models
         */
        $models = $this->storeBranchRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeBranchRepository->filterBy($filter);
        return $this;
    }
}
