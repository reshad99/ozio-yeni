<?php

namespace App\Services\V1\RepositoryServices;

use App\Exceptions\V1\Admin\AdminNotFoundException;
use App\Models\Admin;
use App\Repositories\Abstract\V1\AdminRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\Admin\StoreAdminRequest;
use Modules\Admin\Http\Requests\Admin\UpdateAdminRequest;

class AdminService
{
    /**
     * @param AdminRepositoryInterface $adminRepository
     */
    public function __construct(
        private AdminRepositoryInterface $adminRepository
    ) {
        $this->adminRepository = $adminRepository;
    }

    /**
     * @return Collection<int, Admin>
     */
    public function getAllAdmins(): Collection
    {
        /**
         * @var Collection<int, Admin> $models;
         */
        $models = $this->adminRepository->all();
        return $models;
    }

    /**
     * @param int $id
     * @return Admin
     * @throws AdminNotFoundException
     */
    public function findOrFailAdmin($id)
    {
        /**
         * @var ?Admin $model
         */
        $model = $this->adminRepository->ofId($id);
        if (!$model) {
            throw new AdminNotFoundException();
        }
        return $model;
    }
    /**
     * @param StoreAdminRequest $adminRequest
     * @return Admin
     */
    public function createAdmin($adminRequest): Admin
    {
        $admin = new Admin();
        $admin->name = $adminRequest['name'];
        $admin->email = $adminRequest['email'];
        $admin->phone = $adminRequest['phone'];
        $admin->password = Hash::make($adminRequest['password']);

        /**
         * @var Admin $model
         */
        $model = $this->adminRepository->create($admin);
        return $model;
    }
    /**
     * @param UpdateAdminRequest $admin
     * @return Admin
     * @throws AdminNotFoundException
     */
    public function updateAdmin($adminUpdateRequest): Admin
    {

        $id = $adminUpdateRequest['id'];
        /**
         * @var Admin $model|null
         */
        $model = $this->findOrFailAdmin($id);

        $model->name = $adminUpdateRequest['name'];
        $model->email = $adminUpdateRequest['email'];
        $model->phone = $adminUpdateRequest['phone'];
        $model->password = Hash::make($adminUpdateRequest['password']);

        $this->adminRepository->update($model);
        return $model;
    }
    /**
     * @param Admin $model
     * @return void
     */
    public function deleteAdmin($model): void
    {
        $this->adminRepository->delete($model);
    }
    /**
     * @param array<string,mixed> $with
     * @return self
     */
    public function setWith(array $with): self
    {
        $this->adminRepository->with($with);
        return $this;
    }
    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->adminRepository->filterBy($filter);
        return $this;
    }
    /**
     * @param string $columnNumber
     * @param string $sort
     * @return self
     */
    public function setOrderBy($columnNumber, $sort): self
    {
        $this->adminRepository->orderBy($columnNumber, $sort);
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
        $models = $this->adminRepository->paginate($perpage, $page);
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
        $this->adminRepository->groupBy($column);
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
        $this->adminRepository->having($column, $operator, $value);
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
        $this->adminRepository->where($column, $operator, $value);
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
        $this->adminRepository->orWhere($column, $operator, $value);
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
        $this->adminRepository->whereIn($column, $value);
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
        $this->adminRepository->whereNotIn($column, $value);
        return $this;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function yajraDatatableExport(Request $request)
    {
        return  $this->adminRepository->yajraDatatableExport($request);
    }
}
