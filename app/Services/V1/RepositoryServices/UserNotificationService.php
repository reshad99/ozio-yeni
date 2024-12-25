<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\UserNotification;
use App\Models\Currency;
use App\Repositories\Concrete\V1\UserNotificationRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserNotificationService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserNotificationRepository $userNotificationRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->userNotificationRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<UserNotification>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->userNotificationRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->userNotificationRepository->filterBy($filter);
        return $this;
    }
}
