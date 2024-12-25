<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\SystemCourierRating;
use App\Models\Currency;
use App\Repositories\Concrete\V1\SystemCourierRatingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SystemCourierRatingService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private SystemCourierRatingRepository $systemCourierRatingRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->systemCourierRatingRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<SystemCourierRating>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->systemCourierRatingRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->systemCourierRatingRepository->filterBy($filter);
        return $this;
    }
}
