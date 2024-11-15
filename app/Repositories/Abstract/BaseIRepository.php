<?php

namespace App\Repositories\Abstract;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseIRepository
{
    /**
     * @param string $search
     * @return self
     */
    public function search(string $search): self;

    /**
     * @param string $columnNumber
     * @param string $sort
     * @return self
     */
    public function orderBy($columnNumber, $sort): self;
    /**
     * @param int $limit
     * @return self
     */
    public function limit(int $limit): self;
    /**
     * @param int $offset
     * @return self
     */
    public function offset(int $offset): self;
    /**
     * @return int
     */
    public function count(): int;
    /**
     * @param int $start
     * @param int $limit
     * @return Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function get(int $start, int $limit): Collection;

    /**
     * @return Collection<int, \Illuminate\Database\Eloquent\Model>
     */
    public function all(): Collection;

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function ofId(int $id);
    /**
     * Create a new model instance.
     *
     * @param mixed $model The model instance to create.
     * @return mixed The created model instance.
     */
    public function create($model);

    /**
     * Update an existing model instance.
     *
     * @param mixed $model The model instance to update.
     * @return mixed The updated model instance.
     */
    public function update($model);

    /**
     * Delete a model instance.
     *
     * @param mixed $model The model instance to delete.
     * @return void
     */
    public function delete($model): void;


    /**
     * @param int $perPage
     * @return LengthAwarePaginator<\Illuminate\Database\Eloquent\Model>
     */
    public function paginate(int $perPage = 10, int $page = 1): LengthAwarePaginator;

    /**
     * @param array<string, mixed> $relations
     */
    public function with(array $relations): self;
    /**
     * Set filters for the query.
     *
     * @param array<string,mixed> $criteria
     * @return self
     */
    public function filterBy(array $criteria): self;
    // Other necessary methods, like findById, create, update, delete...
}
