<?php

namespace App\Services\V1\Api\Sms\Gateways;

use App\Enums\LsimResponseCode;
use App\Services\V1\Api\Sms\SmsGateway;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Nette\Utils\Json;

class Lsim implements SmsGateway
{
    private string $user;
    private string $password;
    private string $url;

    private string $receiver;
    private string $content;

    /**
     * @var array<string, mixed>
     */
    private array $headers;

    /**
     * @var array<string, mixed>
     */
    private array $body;

    private mixed $response;
    private string $sender;

    public function __construct()
    {
        $this->user = config(key: 'services.lsim.user');
        $this->password = config(key: 'services.lsim.password');
        $this->sender = config(key: 'services.lsim.sender');

        $this->setHost();
        $this->setRequestHeaders();
    }

    private function setHost(): void
    {
        $this->url = config(key: 'services.lsim.url');
    }

    private function setRequestHeaders(): void
    {
        $this->headers = [
            'Content-Type' => 'application/json'
        ];
    }

    private function setRequestBody(string $message): void
    {
        $key_data = md5(md5($this->password) . $this->user . $message . $this->getReceiver() . $this->sender);
        $scheduledData = "NOW";
        $unicodeData = "false";
        $this->body = [
            'login' => config('services.lsim.user'),
            'key' => $key_data,
            'msisdn' => $this->getReceiver(),
            'text' => $message,
            'sender' => $this->sender,
            'scheduled' => $scheduledData,
            'unicode' => $unicodeData
        ];;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setReceiver(string $receiver): void
    {
        $this->receiver = $receiver;
    }

    public function sendSms(string $message, string $receiver): bool
    {
        $this->setReceiver($receiver);
        $this->setRequestBody($message);
        $htppCall = Http::post($this->url, $this->body);
        if (isset($htppCall->json()["successMessage"])) {
            return true;
        } else {
            Log::channel('sms')->info("sms error");
            Log::channel('sms')->info("requestBody: " . json_encode($this->body));
            Log::channel('sms')->info("responseBody: " . json_encode($htppCall->json()));
            return false;
        }
    }


    public function validateResponse(mixed $response): bool
    {
        $isSent = ($response['head']['responsecode'] ?? '') == LsimResponseCode::SUCCESS->value;
        return $isSent;
    }

    public function getResponse(): mixed
    {
        return $this->response;
    }

    public function getReceiver(): string
    {
        return $this->receiver;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
