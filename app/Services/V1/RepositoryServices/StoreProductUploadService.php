<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\StoreProductUpload;
use App\Models\Currency;
use App\Repositories\Concrete\V1\StoreProductUploadRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreProductUploadService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private StoreProductUploadRepository $storeProductUploadRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->storeProductUploadRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<StoreProductUpload>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->storeProductUploadRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeProductUploadRepository->filterBy($filter);
        return $this;
    }
}
