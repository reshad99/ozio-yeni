<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\V1\Api\TestService;

class TestController extends Controller
{
    protected TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function test(): bool
    {
        return $this->testService->test();
    }
}
