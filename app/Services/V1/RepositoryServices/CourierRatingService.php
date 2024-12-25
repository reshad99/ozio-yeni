<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\CourierRating;
use App\Models\Currency;
use App\Repositories\Concrete\V1\CourierRatingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CourierRatingService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CourierRatingRepository $courierRatingRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->courierRatingRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<CourierRating>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->courierRatingRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->courierRatingRepository->filterBy($filter);
        return $this;
    }
}
