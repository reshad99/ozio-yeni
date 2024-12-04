<?php

namespace App\Services\V1\RepositoryServices;

use App\Exceptions\V1\AdminAccesible\AdminAccessibleNotFoundException;
use App\Models\AdminAccessibleModel;
use App\Repositories\Abstract\V1\AdminAccessibleRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class AdminAccesibleModelService
{
    /**
     * @param AdminAccessibleRepositoryInterface $adminAccessibleRepository
     */
    public function __construct(
        private AdminAccessibleRepositoryInterface $adminAccessibleRepository
    ) {
        $this->adminAccessibleRepository = $adminAccessibleRepository;
    }

    /**
     * @return Collection<int, AdminAccessibleModel>
     */
    public function getAllAdminAccessibleModels(): Collection
    {
        /**
         * @var Collection<int, AdminAccessibleModel> $models;
         */
        $models = $this->adminAccessibleRepository->all();
        return $models;
    }

    /**
     * @param int $id
     * @return AdminAccessibleModel
     */
    public function findOrFailAdminAccessibleModel($id)
    {
        /**
         * @var ?AdminAccessibleModel $model
         */
        $model = $this->adminAccessibleRepository->ofId($id);
        if (!$model) {
            throw new AdminAccessibleNotFoundException();
        }
        return $model;
    }
    /**
     * @param AdminAccessibleModel $AdminAccessibleModel
     * @return AdminAccessibleModel
     */
    public function createAdminAccessibleModel($AdminAccessibleModel): AdminAccessibleModel
    {
        /**
         * @var AdminAccessibleModel $model
         */
        $model = $this->adminAccessibleRepository->create($AdminAccessibleModel);
        return $model;
    }
    /**
     * @param AdminAccessibleModel $AdminAccessibleModel
     * @return AdminAccessibleModel
     */
    public function updateAdminAccessibleModel($AdminAccessibleModel): AdminAccessibleModel
    {
        /**
         * @var AdminAccessibleModel $model
         */
        $model = $this->findOrFailAdminAccessibleModel($AdminAccessibleModel->id);
        return $model;
    }
    /**
     * @param AdminAccessibleModel $model
     * @return void
     */
    public function deleteAdminAccessibleModel($model): void
    {
        $this->adminAccessibleRepository->delete($model);
    }
    /**
     * @param array<string,mixed> $with
     * @return self
     */
    public function setWith(array $with): self
    {
        $this->adminAccessibleRepository->with($with);
        return $this;
    }
    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->adminAccessibleRepository->filterBy($filter);
        return $this;
    }
    /**
     * @param string $columnNumber
     * @param string $sort
     * @return self
     */
    public function setOrderBy($columnNumber, $sort): self
    {
        $this->adminAccessibleRepository->orderBy($columnNumber, $sort);
        return $this;
    }
    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<AdminAccessibleModel>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<AdminAccessibleModel> $models
         */
        $models = $this->adminAccessibleRepository->paginate($perpage, $page);
        return $models;
    }

    //group by
    /**
     *
     * @param string $column
     * @return self
     */
    public function setGroupBy($column): self
    {
        $this->adminAccessibleRepository->groupBy($column);
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
        $this->adminAccessibleRepository->having($column, $operator, $value);
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
        $this->adminAccessibleRepository->where($column, $operator, $value);
        return $this;
    }
    //orWhere
    /**
     *
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function setOrWhere($column, $operator, $value): self
    {
        $this->adminAccessibleRepository->orWhere($column, $operator, $value);
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
        $this->adminAccessibleRepository->whereIn($column, $value);
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
        $this->adminAccessibleRepository->whereNotIn($column, $value);
        return $this;
    }
}
