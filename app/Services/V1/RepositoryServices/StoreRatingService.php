<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreRating;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreRatingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreRatingService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreRatingRepository $storeRatingRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeRatingRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreRating>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeRatingRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeRatingRepository->filterBy($filter);
        return $this;
    }
}
