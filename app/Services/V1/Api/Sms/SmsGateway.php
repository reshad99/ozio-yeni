<?php

namespace App\Services\V1\Api\Sms;

interface SmsGateway
{
    public function sendSms(string $message, string $receiver): bool;
    public function getResponse(): mixed;
    public function setReceiver(string $receiver): void;
    public function setContent(string $content): void;
    public function getReceiver(): string;
    public function getContent(): string;
}
