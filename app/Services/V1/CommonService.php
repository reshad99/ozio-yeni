<?php

namespace App\Services\V1;

use App\Repositories\Abstract\BaseIRepository;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Psr\Log\LoggerInterface;

abstract class CommonService
{
    /**
     * @var array<string, mixed> $requestCapture
     */
    protected array $requestCapture = [];
    /**
     * @var array<string, mixed> $rules
     */
    protected array $rules = [];
    /**
     * @var array<string, mixed> $updateRules
     */
    protected array $updateRules = [];
    /**
     * @var array<string, mixed> $fields
     */
    protected array $fields = [];
    /**
     * @var string $driverGuard
     */
    protected string $driverGuard;

    /**
     * @var LoggerInterface $channel
     */
    protected LoggerInterface $channel;

    /**
     * @var BaseIRepository
     * */
    protected $mainRepository;

    /**
     * CommonService constructor.
     * @param BaseIRepository|null $mainRepository
     * @param array<string, mixed> $request
     * @param string $logChannel
     * @return void
     */
    public function __construct(BaseIRepository $mainRepository = null, array $request = [], string $logChannel = '')
    {
        $this->channel = Log::channel($logChannel);
        $this->mainRepository = $mainRepository;
        $this->requestCapture = $request;
        $this->driverGuard = 'driver';
    }

    /**
     * @param callable $callback
     * @return mixed
     * @throws Exception
     */
    protected function process(callable $callback): mixed
    {
        $rData = $this->requestCaptureEjector();
        try {
            DB::beginTransaction();
            $model = $callback($rData);
            DB::commit();
            return $model;
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage() . ' ' . $exception->getFile() . ' ' . $exception->getLine());
            throw $exception;
        }
    }

    /**
     * @return array
     */
    protected function requestCaptureEjector(): array
    {
        return $this->requestCapture;
    }

    /**
     * @param array $capture
     * @return void
     */
    protected function setRequestCapture(array $capture): void
    {
        $this->requestCapture = $capture;
    }

    /**
     * @param Request $request
     * @param array $rules
     * @throws ValidationException
     * @return void
     */
    public function validate(Request $request, array $rules): void
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @param Exception $e
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function errorResponse(Exception $e): Response | JsonResponse
    {
        if ($e instanceof ValidationException) {
            return response()->json(['status' => 'error', 'message' => 'Məlumatları düzgün daxil edin', 'errors' => $e->validator->errors()], 422);
        }
        return response(['status' => 'error', 'message' => $e->getMessage()], 400);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    public function successResponse(string $message = 'Məlumat əlavə edildi'): Response
    {
        return response(['status' => 'success', 'message' => $message], 200);
    }

    /**
     * @param string $message
     * @param mixed $data
     * @return \Illuminate\Http\Response
     */
    public function dataResponse(string $message = 'Məlumat əlavə edildi', $data = null): Response
    {
        return response(['status' => 'success', 'message' => $message, 'data' => $data], 200);
    }

    /**
     * @param null $data
     * @return \Illuminate\Http\Response
     */
    public function simpleDataResponse($data = null): Response
    {
        return response(['status' => 'success', 'data' => $data], 200);
    }

    /**
     * @param int $count
     * @param null $data
     * @return \Illuminate\Http\Response
     */
    public function fetchResponse(int $count = 0, $data = null): Response
    {
        return response(['status' => 'success', 'count' => $count, 'data' => $data], 200);
    }

    /**
     * @param $message
     */
    public function infoLogging(string $message): void
    {
        $this->channel->info($message);
    }

    /**
     * @param $message
     * return void
     */
    public function errorLogging(string $message): void
    {
        $this->channel->error($message);
    }

    /**
     * @return Guard
     */
    public function driverAuth(): Guard
    {
        return auth()->guard($this->driverGuard);
    }

    /**
     * @return Authenticatable
     */
    public function driverUser(): Authenticatable
    {
        return $this->driverAuth()->user();
    }
}
