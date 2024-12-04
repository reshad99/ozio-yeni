<?php

namespace App\Repositories\Abstract\V1;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface IBaseRepository
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
     * @return Collection<int, Model>
     */
    public function get(int $start, int $limit): Collection;

    /**
     * @return Collection<int, Model>
     */
    public function all(): Collection;

    /**
     * @param int $id
     * @return  Model
     */
    public function ofId(int $id);

    /**
     * Create a new model instance.
     *
     * @param Model $model
     * @return  Model The created model instance.
     */
    public function create($model);

    /**
     * Update an existing model instance.
     *
     * @param Model $model The model instance to update.
     * @return Model The updated model instance.
     */
    public function update($model);

    /**
     * Delete a model instance.
     *
     * @param Model $model The model instance to delete.
     * @return void
     */
    public function delete($model): void;


    /**
     * @param int $perPage
     * @return LengthAwarePaginator<Model>
     */
    public function paginate(int $perPage = 10, int $page = 1): LengthAwarePaginator;

    /**
     * @param string $column
     * @return self
     */
    public function groupBy(string $column): self;

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function having(string $column, string $operator, string $value): self;

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


    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function where(string $column, string $operator, string $value): self;


    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function orWhere(string $column, string $operator, string $value): self;


    /**
     * @param string $column
     * @param array<string> $value
     * @return self
     */
    public function whereIn(string $column, array $value): self;


    /**
     *
     * @param string $column
     * @param array<string> $value
     * @return self
     */
    public function whereNotIn(string $column, array $value): self;
}
