<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\OrderItem;
use App\Models\Currency;
use App\Repositories\Concrete\V1\OrderItemRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderItemService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private OrderItemRepository $orderItemRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->orderItemRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<OrderItem>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->orderItemRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->orderItemRepository->filterBy($filter);
        return $this;
    }
}
