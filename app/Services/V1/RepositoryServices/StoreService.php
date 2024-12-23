<?php

namespace App\Services\V1\RepositoryServices;

use App\Exceptions\V1\Store\StoreNotFoundException;
use App\Models\Admin;
use App\Models\Store;
use App\Repositories\Abstract\V1\StoreRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\Store\StoreStoreRequest;
use Modules\Admin\Http\Requests\Store\UpdateStoreRequest;

class StoreService
{
    /**
     * @param StoreRepositoryInterface $storeRepository
     */
    public function __construct(
        private StoreRepositoryInterface $storeRepository
    )
    {
    }

    /**
     * @return Collection<int, Store>
     */
    public function getAllStores()
    {
        /**
         * @var Collection<int, Store> $models
         */
        $models = $this->storeRepository->all();
        return $models;
    }

    /**
     * @param $id
     * @return Store|null
     * @throws StoreNotFoundException
     */
    public function findOrFailStore($id)
    {
        /**
         * @var ?Store $model
         */
        $model = $this->storeRepository->ofId($id);
        if (!$model)
            throw new StoreNotFoundException();
        return $model;
    }

    /**
     * @param StoreStoreRequest $storeRequest
     * @return Store
     */
    public function createStore(StoreStoreRequest $storeRequest): Store
    {
        $model = new Store();

        $model['module_id'] = $storeRequest['module_id'];
        $model['name'] = $storeRequest['name'];
        $model['store_code'] = $storeRequest['store_code'];
        $model['currency_id'] = $storeRequest['currency_id'];
        $model['phone'] = $storeRequest['phone'];
        $model['country_id'] = $storeRequest['country_id'];
        $model['city_id'] = $storeRequest['city_id'];
        $model['email'] = $storeRequest['email'];
        $model['password'] = $storeRequest['password'];
        $model['lat'] = $storeRequest['lat'];
        $model['lng'] = $storeRequest['lng'];
        $model['status'] = $storeRequest['status'];
        $model['store_category_id'] = $storeRequest['store_category_id'];
        $model['have_vegan'] = $storeRequest['have_vegan'];
        $model['have_not_vegan'] = $storeRequest['have_not_vegan'];
        $model['open_time'] = $storeRequest['open_time'];
        $model['close_time'] = $storeRequest['close_time'];
        $model['zone_id'] = $storeRequest['zone_id'];
        $model['branch_id'] = $storeRequest['branch_id'];

        /**
         * @var Store $model
         */
        $model = $this->storeRepository->create($model);
        return $model;
    }

    /**
     * @param UpdateStoreRequest $storeRequest
     * @param $id
     * @return Store
     * @throws StoreNotFoundException
     */
    public function updateStore(UpdateStoreRequest $storeRequest, $id): Store
    {
        $storeRequest = $storeRequest->validated();

        /**
         * @var Store $model
         */
        $model = $this->findOrFailStore($id);

        if (isset($storeRequest['module_id']))
            $model->module_id = $storeRequest['module_id'];
        if (isset($storeRequest['name']))
            $model->name = $storeRequest['name'];
        if (isset($storeRequest['store_code']))
            $model->store_code = $storeRequest['store_code'];
        if (isset($storeRequest['currency_id']))
            $model->currency_id = $storeRequest['currency_id'];
        if (isset($storeRequest['phone']))
            $model->phone = $storeRequest['phone'];
        if (isset($storeRequest['city_id']))
            $model->city_id = $storeRequest['city_id'];
        if (isset($storeRequest['email']))
            $model->email = $storeRequest['email'];
        if (isset($storeRequest['password']))
            $model->password = Hash::make($storeRequest['password']);
        if (isset($storeRequest['device_id']))
            $model->device_id = $storeRequest['device_id'];
        if (isset($storeRequest['lat']))
            $model->lat = $storeRequest['lat'];
        if (isset($storeRequest['lng']))
            $model->lng = $storeRequest['lng'];
        if (isset($storeRequest['status']))
            $model->status = $storeRequest['status'];
        if (isset($storeRequest['rating']))
            $model->rating = $storeRequest['rating'];
        if (isset($storeRequest['store_category_id']))
            $model->store_category_id = $storeRequest['store_category_id'];
        if (isset($storeRequest['have_vegan']))
            $model->have_vegan = $storeRequest['have_vegan'];
        if (isset($storeRequest['have_not_vegan']))
            $model->have_not_vegan = $storeRequest['have_not_vegan'];
        if (isset($storeRequest['open_time']))
            $model->open_time = $storeRequest['open_time'];
        if (isset($storeRequest['close_time']))
            $model->close_time = $storeRequest['close_time'];
        if (isset($storeRequest['zone_id']))
            $model->zone_id = $storeRequest['zone_id'];
        if (isset($storeRequest['branch_id']))
            $model->branch_id = $storeRequest['branch_id'];

        $this->storeRepository->update($model);
        return $model;
    }

    /**
     * @param $id
     * @return void
     * @throws StoreNotFoundException
     */
    public function deleteStore($id): void
    {
        $model = $this->findOrFailStore($id);
        $this->storeRepository->delete($model);
    }

    public function deleteMultipleStore($ids): void
    {
        $this->storeRepository->deleteMultiple($ids);
    }

    /**
     * @param array<string,mixed> $with
     * @return self
     */
    public function setWith(array $with): self
    {
        $this->storeRepository->with($with);
        return $this;
    }

    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->storeRepository->filterBy($filter);
        return $this;
    }

    /**
     * @param string $columnNumber
     * @param string $sort
     * @return self
     */
    public function setOrderBy($columnNumber, $sort): self
    {
        $this->storeRepository->orderBy($columnNumber, $sort);
        return $this;
    }

    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<Admin>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<Admin> $models
         */
        $models = $this->storeRepository->paginate($perpage, $page);
        return $models;
    }

    /**
     *
     * @param string $column
     * @return self
     */
    public function setGroupBy($column): self
    {
        $this->storeRepository->groupBy($column);
        return $this;
    }
    //having

    /**
     *
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function setHaving($column, $operator, $value): self
    {
        $this->storeRepository->having($column, $operator, $value);
        return $this;
    }
    //where

    /**
     *
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function setWhere($column, $operator, $value): self
    {
        $this->storeRepository->where($column, $operator, $value);
        return $this;
    }

    /**
     *
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function setOrWhere($column, $operator, $value): self
    {
        $this->storeRepository->orWhere($column, $operator, $value);
        return $this;
    }

    /**
     *
     * @param string $column
     * @param array<string> $value
     * @return self
     */
    public function setWhereIn($column, $value): self
    {
        $this->storeRepository->whereIn($column, $value);
        return $this;
    }

    /**
     *
     * @param string $column
     * @param array<string> $value
     * @return self
     */
    public function setWhereNotIn($column, $value): self
    {
        $this->storeRepository->whereNotIn($column, $value);
        return $this;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function yajraDatatableExport(Request $request)
    {
        return $this->storeRepository->yajraDatatableExport($request);
    }
}
