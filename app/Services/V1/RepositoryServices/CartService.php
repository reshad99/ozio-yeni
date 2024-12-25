<?php

namespace App\Services\V1\RepositoryServices;

use App\Models\Cart;
use App\Models\Currency;
use App\Repositories\Concrete\V1\CartRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CartService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private CartRepository $cartRepository)
    {
    }

    /**
     * @param $perPage
     * @param $page
     * @return string
     */
    public function getSelect2($perPage, $page)
    {
        return $this->cartRepository->getSelect2($perPage, $page, 'name', 'id');
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Cart>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Currency> $models
         */
        $models = $this->cartRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->cartRepository->filterBy($filter);
        return $this;
    }
}
