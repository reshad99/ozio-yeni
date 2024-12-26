<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreProductRating;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreProductRatingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreProductRatingService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreProductRatingRepository $storeProductRatingRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeProductRatingRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreProductRating>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeProductRatingRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeProductRatingRepository->filterBy($filter);
        return $this;
    }
}
