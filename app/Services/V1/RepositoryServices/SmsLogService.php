<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\SmsLog;
use App\Models\Currency;
use App\Repositories\Concrete\V1\SmsLogRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SmsLogService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private SmsLogRepository $smsLogRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->smsLogRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<SmsLog>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->smsLogRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->smsLogRepository->filterBy($filter);
        return $this;
    }
}
