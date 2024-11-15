<?php

namespace App\Services\V1\Api;

use App\Services\V1\CommonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TestService extends CommonService
{
    public function __construct()
    {
    }

    /**
     * @return Response | JsonResponse
     * @throws \Exception
     */
    public function test()
    {
        try {
            /*
            * This is a test function
            */
            return response(['status' => 'success', 'data' => Auth::user()], 200);
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }
}
