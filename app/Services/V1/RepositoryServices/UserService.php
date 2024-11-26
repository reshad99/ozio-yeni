<?php

namespace App\Services\V1\RepositoryServices;

use App\Exceptions\V1\User\UserNotFoundException;
use App\Repositories\Abstract\V1\IBaseRepository;

class UserService
{
    public function __construct(
        private IBaseRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function findOrFailUser($id)
    {
        $user = $this->userRepository->ofId($id);
        if (!$user) {
            throw new UserNotFoundException();
        }
        return $user;
    }
    public function createUser($data)
    {
        return $this->userRepository->create($data);
    }
    public function updateUser($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }
    public function deleteUser($id)
    {
        $this->userRepository->delete($id);
    }
    public function setWith(array $with)
    {
        $this->userRepository->with($with);
    }
    public function setFilter(array $filter)
    {
        $this->userRepository->filterBy($filter);
    }
    public function setOrderBy($columnNumber, $sort)
    {
        $this->userRepository->orderBy($columnNumber, $sort);
    }
    public function setPaginate($perpage, $page)
    {
        $this->userRepository->paginate($perpage, $page);
    }
}
