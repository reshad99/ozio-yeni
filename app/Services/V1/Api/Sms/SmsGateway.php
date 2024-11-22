<?php

namespace App\Services\V1\Sms;

interface SmsGateway
{
    public function sendSms($receiver, $content): array;
    public function getResponse();
    public function getReceiver();
    public function getContent();
}
