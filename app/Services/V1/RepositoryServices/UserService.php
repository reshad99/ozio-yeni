<?php

namespace App\Services\V1\RepositoryServices;

use App\Exceptions\V1\User\UserNotFoundException;
use App\Models\User;
use App\Repositories\Abstract\V1\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserService
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * @return Collection<int, User>
     */
    public function getAllUsers(): Collection
    {
        /**
         * @var Collection<int, User> $models;
         */
        $models = $this->userRepository->all();
        return $models;
    }

    /**
     * @param int $id
     * @return User
     */
    public function findOrFailUser($id)
    {
        /**
         * @var ?User $model
         */
        $model = $this->userRepository->ofId($id);
        if (!$model) {
            throw new UserNotFoundException();
        }
        return $model;
    }
    /**
     * @param User $user
     * @return User
     */
    public function createUser($user): User
    {
        /**
         * @var User $model
         */
        $model = $this->userRepository->create($user);
        return $model;
    }
    /**
     * @param User $user
     * @return User
     */
    public function updateUser($user): User
    {
        /**
         * @var User $model
         */
        $model = $this->findOrFailUser($user->id);
        return $model;
    }
    /**
     * @param User $model
     * @return void
     */
    public function deleteUser($model): void
    {
        $this->userRepository->delete($model);
    }
    /**
     * @param array<string,mixed> $with
     * @return self
     */
    public function setWith(array $with): self
    {
        $this->userRepository->with($with);
        return $this;
    }
    /**
     * @param array<string,mixed> $filter
     * @return self
     */
    public function setFilter(array $filter): self
    {
        $this->userRepository->filterBy($filter);
        return $this;
    }
    /**
     * @param string $columnNumber
     * @param string $sort
     * @return self
     */
    public function setOrderBy($columnNumber, $sort): self
    {
        $this->userRepository->orderBy($columnNumber, $sort);
        return $this;
    }
    /**
     * @param int $perpage
     * @param int $page
     * @return LengthAwarePaginator<User>
     */
    public function setPaginate($perpage, $page): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<User> $models
         */
        $models = $this->userRepository->paginate($perpage, $page);
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
        $this->userRepository->groupBy($column);
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
        $this->userRepository->having($column, $operator, $value);
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
        $this->userRepository->where($column, $operator, $value);
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
        $this->userRepository->orWhere($column, $operator, $value);
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
        $this->userRepository->whereIn($column, $value);
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
        $this->userRepository->whereNotIn($column, $value);
        return $this;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function yajraDatatableExport(Request $request)
    {
        return  $this->userRepository->yajraDatatableExport($request);
    }
}
