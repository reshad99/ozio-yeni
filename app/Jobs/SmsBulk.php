<?php

namespace App\Jobs;

use App\Services\V1\Sms\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SmsBulk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private SmsService $smsService;
    private array $message;

    /**
     * Create a new job instance.
     *
     * @param SmsService $smsService
     * @param array $messages
     *
     * @return void
     */
    public function __construct(SmsService $smsService, $message)
    {
        $this->smsService = $smsService;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->smsService->execute(
            $this->message['receiver'],
            $this->message['sms'],
            $this->message['variables']
        );
    }
}
