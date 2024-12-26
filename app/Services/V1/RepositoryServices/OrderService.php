<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Order;
use App\Models\Currency;
use App\Repositories\Concrete\V1\OrderRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private OrderRepository $orderRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->orderRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Order>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->orderRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->orderRepository->filterBy($filter);
        return $this;
    }
}
