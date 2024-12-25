<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Coupon;
use App\Models\Currency;
use App\Repositories\Concrete\V1\CouponRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CouponService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CouponRepository $couponRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->couponRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Coupon>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->couponRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->couponRepository->filterBy($filter);
        return $this;
    }
}
