<?php

namespace App\Repositories\Concrete\V1;

use App\Repositories\Abstract\V1\IBaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    /**
     * @var Builder<\Illuminate\Database\Eloquent\Model>
     */
    protected Builder $query;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(

        private $model
    )
    {
        protected $model
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

    /**
     * @param string $column
     * @param string $sort
     * @return self
     */
    public function orderBy($column, $sort): self
    {
        $this->query->orderBy($column, $sort);
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @return Collection<int, Model>
     */
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
        return $query->count();
    }

    /** {@inheritDoc} */
    public function ofId(int $id)
    {
        $query = clone $this->query;
        $object = $query->find($id);
        return $object;
    }


    /** {@inheritDoc} */
    public function first()
    {
        $query = clone $this->query;
        $object = $query->first();
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

    //example using
    // return getSelectTwo('id', 'product_code', '( {{product_code}} )', 'AZ');

    /** {@inheritDoc} */
    public function getSelect2($perPage, $page, $outputColumn, $idColumn = 'id', $secondOutput = '', $jsonKey = null): string
    {
        $type = $this->paginate($perPage, $page);
        $type->getCollection()->transform(function ($item) use ($outputColumn, $idColumn, $secondOutput, $jsonKey) {
            $text = $item->$outputColumn;

            if ($jsonKey && is_string($text) && self::isJson($text)) {
                $textArray = json_decode($text, true);
                $text = $textArray[$jsonKey] ?? $text;
            }
            // Eğer ikinci bir parametre olarak dinamik bir sütun formatı varsa
            if ($secondOutput != '') {
                // {{column_name}} olan stringi analiz edelim
                preg_match_all('/\{\{(\w+)\}\}/', $secondOutput, $matches);

                foreach ($matches[1] as $columnName) {
                    if (isset($item->$columnName)) {
                        // Column'u bulduğumuzda, ana metine ekleyelim.
                        $secondOutput = str_replace('{{' . $columnName . '}}', $item->$columnName, $secondOutput);
                    }
                }

                // Sonra bu sonucu ana text'e ekleyelim.
                $text .= ' ' . $secondOutput;
            }

            return [
                'id' => $item->$idColumn,
                'text' => $text
            ];
        });

        return json_encode([
            'results' => $type->items(),
            'pagination' => [
                'more' => $type->hasMorePages()
            ]
        ]);
    }

    /**
     * @param string $string
     * @return bool
     */
    private static function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /** {@inheritDoc} */
    public function with(array $relations): self
    {
        $newRelations = [];
        foreach ($relations as $key => $value) {
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

    /** {@inheritDoc} */
    public function groupBy(string $column): self
    {
        $this->query->groupBy($column);
        return $this;
    }

    /** {@inheritDoc} */
    public function having(string $column, string $operator, string $value): self
    {
        $this->query->having($column, $operator, $value);
        return $this;
    }

    /** {@inheritDoc} */
    public function where(string $column, string $operator, string $value): self
    {
        $this->query->where($column, $operator, $value);
        return $this;
    }

    /** {@inheritDoc} */
    public function orWhere(string $column, string $operator, string $value): self
    {
        $this->query->orWhere($column, $operator, $value);

        return $this;
    }

    /** {@inheritDoc} */
    public function whereIn(string $column, array $value): self
    {
        $this->query->whereIn($column, $value);
        return $this;
    }

    /** {@inheritDoc} */
    public function whereNotIn(string $column, array $value): self
    {
        $this->query->whereNotIn($column, $value);
        return $this;
    }
}
