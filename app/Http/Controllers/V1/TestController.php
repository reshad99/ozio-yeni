<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\V1\Api\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function test(): void
    {
        $this->testService->test();
    }
}
