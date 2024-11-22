<?php

namespace App\Services\V1\Sms\Gateways;

use App\Services\V1\Sms\SmsGateway;
use Exception;
use Nette\Utils\Json;

class Likon implements SmsGateway
{
    private $user;
    private $password;
    private $url;

    private $receiver;
    private $content;

    private $headers;
    private $body;

    private $response;

    public function __construct()
    {
        $this->user = config('app.sms_likon_user');
        $this->password = config('app.sms_likon_pwd');

        $this->setHost();
        $this->setRequestHeaders();
    }

    private function setHost(): void
    {
        $this->url = config('app.sms_likon_baseurl');
    }

    private function setRequestHeaders(): void
    {
        $this->headers = [
            'Accept' => 'text/xml',
            'Content-Type' => 'text/xml; charset=UTF8'
        ];
    }

    private function setRequestBody(): void
    {
        $this->body = '
            <?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <SMS-InsRequest>
                <CLIENT from="vipex.az" pwd="' . $this->password . '" user="' . $this->user . '"/>
                <INSERT datacoding="0" to="' . $this->receiver . '">
                    <TEXT>' . $this->content . ' </TEXT>
                </INSERT>
            </SMS-InsRequest>';
    }

    public function sendSms($receiver, $content): array
    {
        $this->receiver = $receiver;
        $this->content = $content;

        $this->setRequestBody();

        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request(
            'POST',
            $this->url,
            $this->headers,
            $this->body
        );
        try {
            $this->response = $this->parseResponse($client->send($request));
            $isSent = $this->validateResponse($this->response);
        } catch (Exception $e) {
            $isSent = false;
            $message = $e->getMessage();
        }

        return [
            'status' => $isSent,
            'message' => $message ?? '',
            'response' => $this->response ?? ''
        ];
    }

    private function parseResponse($response)
    {
        $response = simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
        return Json::decode(Json::encode($response), true);
    }

    public function validateResponse($response): bool
    {
        $isSent = ($response['STATUS']['@attributes']['res'] ?? '') == 100;
        return $isSent;
    }

    public function getResponse(): mixed
    {
        return $this->response;
    }

    public function getReceiver(): mixed
    {
        return $this->receiver;
    }

    public function getContent(): mixed
    {
        return $this->content;
    }
}
