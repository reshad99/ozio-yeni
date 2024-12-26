<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Category;
use App\Models\Currency;
use App\Repositories\Concrete\V1\CategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CategoryRepository $categoryRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->categoryRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Category>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->categoryRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->categoryRepository->filterBy($filter);
        return $this;
    }
}
