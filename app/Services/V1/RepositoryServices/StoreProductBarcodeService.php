<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreProductBarcode;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreProductBarcodeRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreProductBarcodeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreProductBarcodeRepository $storeProductBarcodeRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeProductBarcodeRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreProductBarcode>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeProductBarcodeRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeProductBarcodeRepository->filterBy($filter);
        return $this;
    }
}
