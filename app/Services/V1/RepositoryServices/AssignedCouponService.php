<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\AssignedCoupon;
use App\Models\Currency;
use App\Repositories\Concrete\V1\AssignedCouponRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class AssignedCouponService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private AssignedCouponRepository $assignedCouponRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->assignedCouponRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<AssignedCoupon>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->assignedCouponRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->assignedCouponRepository->filterBy($filter);
        return $this;
    }
}
