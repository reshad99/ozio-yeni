<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Currency;
use App\Repositories\Concrete\V1\CurrencyRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CurrencyService
{
    /**
     * Create a new class instance.
     * @param CurrencyRepository $currencyRepository
     */
    public function __construct(private CurrencyRepository $currencyRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->currencyRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Currency>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->currencyRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->currencyRepository->filterBy($filter);
        return $this;
    }
}
