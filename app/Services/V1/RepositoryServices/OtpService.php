<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Otp;
use App\Models\Currency;
use App\Repositories\Concrete\V1\OtpRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class OtpService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private OtpRepository $otpRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->otpRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Otp>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->otpRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->otpRepository->filterBy($filter);
        return $this;
    }
}
