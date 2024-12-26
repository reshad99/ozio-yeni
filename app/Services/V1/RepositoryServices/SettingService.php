<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Setting;
use App\Models\Currency;
use App\Repositories\Concrete\V1\SettingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SettingService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private SettingRepository $settingRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->settingRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Setting>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->settingRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->settingRepository->filterBy($filter);
        return $this;
    }
}
