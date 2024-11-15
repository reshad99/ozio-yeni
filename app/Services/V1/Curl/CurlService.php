<?php

namespace App\Services\V1\Curl;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

class CurlService
{
    /**
     * @var string[]
     */
    private $headers = [];

    /**
     * @param string[] $headers
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param string $url
     * @param string[] $query
     * @param string|null $groupBy
     * @return Collection<int|string, mixed>  // Updated collection type annotation
     */
    public function get(string $url, array $query = [], string $groupBy = null): Collection
    {
        $response = $this->sendRequest('GET', $url, [
            'query' => $query,
        ]);

        // Collect response as a mixed collection with string or int keys
        /** @var Collection<int|string, mixed> $collection */
        $collection = collect($response->json());

        // If groupBy is provided, group the collection by the specified key
        $collection = $groupBy ? $this->groupBy($collection, $groupBy) : $collection;

        return $collection;
    }

    /**
     * @param Collection<int|string, mixed> $collection
     * @param string $key
     * @return Collection<string, Collection<int|string, mixed>>  // Updated return type for groupBy
     */
    private function groupBy(Collection $collection, $key): Collection
    {
        return $collection->groupBy($key);
    }


    /**
     * @param string $url
     * @param array<string, mixed> $data
     * @return Response
     */
    public function post(string $url, array $data = []): Response
    {
        return $this->sendRequest('POST', $url, [
            'json' => $data,
        ]);
    }

    /**
     * @param string $url
     * @param array<string, mixed> $data
     * @return Response
     */
    public function put(string $url, array $data = []): Response
    {
        return $this->sendRequest('PUT', $url, [
            'json' => $data,
        ]);
    }

    /**
     * @param string $url
     * @return Response
     * @throws \Exception
     */
    public function delete(string $url): Response
    {
        return $this->sendRequest('DELETE', $url);
    }


    /**
     * @param string $method
     * @param string $url
     * @param array<mixed> $options
     * @throws \Exception
     * @return Response
     */
    private function sendRequest(string $method, string $url, array $options = []): Response
    {
        $options = array_merge(['headers' => $this->headers], $options);
        $response = Http::send($method, $url, $options);

        if (!$response->successful()) {
            throw new \Exception("HTTP request to {$url} failed. Status code: {$response->status()}");
        }

        return $response;
    }
}
