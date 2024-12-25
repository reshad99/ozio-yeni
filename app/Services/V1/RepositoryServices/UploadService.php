<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Upload;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UploadRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UploadService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UploadRepository $uploadRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->uploadRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Upload>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->uploadRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->uploadRepository->filterBy($filter);
        return $this;
    }
}
