<?php

namespace App\Repositories\Concrete;

use App\Repositories\Abstract\BaseIRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class BaseRepository implements BaseIRepository
{
    /**
     * @var Builder
     */
    protected Builder $query;

    /**
     * @param $model
     */
    public function __construct(
        private $model
    ) {
        $this->query = $this->model->newQuery();
    }
    /** {@inheritDoc} */
    public function search(string $search): self
    {
        // $this->query
        //     ->where('name', 'like', '%' : $search : '%');

        return $this;
    }

    public function orderBy($column, $sort): self
    {
        $this->query->orderBy($column, $sort);
        return $this;
    }

    public function get(int $start, int $limit): Collection
    {
        return $this->query->skip($start)->take($limit)->get();
    }
    /** {@inheritDoc} */
    public function limit(int $limit): self
    {
        $this->query->limit($limit);
        return $this;
    }

    /** {@inheritDoc} */
    public function offset(int $offset): self
    {
        $this->query->offset($offset);
        return $this;
    }

    /** {@inheritDoc} */
    public function all(): Collection
    {
        return $this->query->get();
    }


    /** {@inheritDoc} */
    public function count(): int
    {
        $query = clone $this->query;
        return  $query->count();
    }

    /** {@inheritDoc} */
    public function ofId(int $id)
    {
        $query = clone $this->query;
        $object = $query->find($id);
        return $object;
    }

    /** {@inheritDoc} */
    public function create($model)
    {
        $model->save();
        return $model;
    }

    /** {@inheritDoc} */
    public function update($model)
    {
        $model->save();
        return $model;
    }

    /** {@inheritDoc} */
    public function delete($model): void
    {
        $model->delete();
    }

    /** {@inheritDoc} */
    public function paginate(int $perPage = 10, int $page = 1): LengthAwarePaginator
    {
        //if perpage is null
        if ($perPage == null) {
            $perPage = 10;
        }

        return $this->query->paginate($perPage, ['*'], 'page', $page);
    }

    /** {@inheritDoc} */
    public function with(array $relations): self
    {
        $newRelations = [];
        foreach ($relations as $key => $value) {
            if (!is_string($key)) {
                continue;
            }
            $newRelations[$key] = function ($query) use ($value) {
                if (isset($value['orderBy']) && isset($value['sort'])) {
                    $query->orderBy($value['orderBy'], $value['sort']);
                }
                if (isset($value['filter'])) {
                    $criteria = $value['filter'];
                    if (is_array($criteria)) {
                        foreach ($criteria as $filterKey => $filterValue) {
                            if (is_array($filterValue)) {
                                //name have a : then it is a relation
                                if (strpos($filterKey, ':') !== false) {
                                    $query->whereHas(explode(':', $filterKey)[0], function ($query) use ($filterKey, $filterValue) {
                                        if (isset($filterValue['operator'])) {
                                            $query->where(explode(':', $filterKey)[1], $filterValue['operator'], $filterValue['value']);
                                        } else {
                                            $query->whereIn(explode(':', $filterKey)[1], $filterValue);
                                        }
                                    });
                                } elseif (isset($filterValue['operator'])) {
                                    $query->where($filterKey, $filterValue['operator'], $filterValue['value']);
                                } else {
                                    $query->whereIn($filterKey, $filterValue);
                                }
                            } else {
                                $query->where($filterKey, $filterValue);
                            }
                        }
                    }
                }
            };
        }

        $this->query->with($newRelations);
        return $this;
    }


    /** {@inheritDoc} */
    public function filterBy(array $criteria): self
    {
        foreach ($criteria as $key => $value) {
            if (is_array($value)) {
                //name have a : then it is a relation
                if (strpos($key, ':') !== false) {
                    $this->query->whereHas(explode(':', $key)[0], function ($query) use ($key, $value) {
                        if (isset($value['operator'])) {
                            $query->where(explode(':', $key)[1], $value['operator'], $value['value']);
                        } else {
                            $query->whereIn(explode(':', $key)[1], $value);
                        }
                    });
                } elseif (isset($value['operator'])) {
                    $this->query->where($key, $value['operator'], $value['value']);
                } else {
                    $this->query->whereIn($key, $value);
                }
            } else {
                $this->query->where($key, $value);
            }
        }
        //to sql
        //log to sql
        return $this;
    }
}
