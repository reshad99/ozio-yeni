<?php

namespace App\Jobs;

use App\Services\V1\Api\Sms\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SmsBulk implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private SmsService $smsService;

    /**
     * @var array<string, mixed>
     */
    private array $message;

    /**
     * Create a new job instance.
     *
     * @param SmsService $smsService
     * @param array<string, mixed> $message
     *
     * @return void
     */
    public function __construct(SmsService $smsService, array $message)
    {
        $this->smsService = $smsService;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->smsService->execute(
            receiver: $this->message['receiver'],
            sms: $this->message['smsText'],
            variables: $this->message['variables']
        );
    }
}
