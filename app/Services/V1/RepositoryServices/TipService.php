<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Tip;
use App\Models\Currency;
use App\Repositories\Concrete\V1\TipRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TipService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private TipRepository $tipRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->tipRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Tip>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->tipRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->tipRepository->filterBy($filter);
        return $this;
    }
}
