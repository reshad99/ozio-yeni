<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UsedCoupon;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UsedCouponRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UsedCouponService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UsedCouponRepository $usedCouponRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->usedCouponRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UsedCoupon>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->usedCouponRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->usedCouponRepository->filterBy($filter);
        return $this;
    }
}
