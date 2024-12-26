<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\ZonePricing;
use App\Models\Currency;
use App\Repositories\Concrete\V1\ZonePricingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ZonePricingService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private ZonePricingRepository $zonePricingRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->zonePricingRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<ZonePricing>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->zonePricingRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->zonePricingRepository->filterBy($filter);
        return $this;
    }
}
