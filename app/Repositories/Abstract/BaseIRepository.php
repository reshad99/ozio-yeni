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
     * @return Collection
     */
    public function get(int $start, int $limit): Collection;

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param int $id
     */
    public function ofId(int $id);

    public function create($model);
    public function update($model);
    public function delete($model): void;

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 10, int $page = 1): LengthAwarePaginator;

    /**
     * @param string[] $relations
     */
    public function with(array $relations): self;
    /**
     * Set filters for the query.
     *
     * @param array<string,string> $criteria
     * @return self
     */
    public function filterBy(array $criteria): self;



    // Other necessary methods, like findById, create, update, delete...
}
