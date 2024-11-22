<?php

namespace App\Services\V1\Sms;

interface SmsGateway
{
    /**
     * @return array<string, mixed>
     */
    public function sendSms(string $receiver, string $content): array;
    public function getResponse(): mixed;
    public function getReceiver(): string;
    public function getContent(): string;
}
