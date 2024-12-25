<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Tag;
use App\Models\Currency;
use App\Repositories\Concrete\V1\TagRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TagService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private TagRepository $tagRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->tagRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<tag>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->tagRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->tagRepository->filterBy($filter);
        return $this;
    }
}
