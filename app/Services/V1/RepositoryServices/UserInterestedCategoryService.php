<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UserInterestedCategory;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UserInterestedCategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserInterestedCategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserInterestedCategoryRepository $userInterestedCategoryRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->userInterestedCategoryRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UserInterestedCategory>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->userInterestedCategoryRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->userInterestedCategoryRepository->filterBy($filter);
        return $this;
    }
}
