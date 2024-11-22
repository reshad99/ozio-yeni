<?php

namespace App\Services\V1\Sms\Gateways;

use App\Enums\LsimResponseCode;
use App\Services\V1\Sms\SmsGateway;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\V1\Curl\CurlService;
use Nette\Utils\Json;

class Lsim implements SmsGateway
{
    private $user;
    private $password;
    private $url;

    private $receiver;
    private $content;

    private $headers;
    private $body;
    private $curlService;

    private $response;

    public function __construct(CurlService $curlService)
    {
        $this->user = config('app.sms_lsim_user');
        $this->password = config('app.sms_lsim_pwd');
        $this->curlService = $curlService;

        $this->setHost();
        $this->setRequestHeaders();
    }

    private function setHost()
    {
        $this->url = config('app.sms_lsim_baseurl');
    }

    private function setRequestHeaders(): void
    {
        $this->headers = [
            'Content-Type' => 'application/xml'
        ];
    }

    private function setRequestBody($controlId): void
    {
        $controlId  =  $controlId == null ? time() :  $controlId;
        $this->body = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
            <request>
                <head>
                    <operation>submit</operation>
                    <login>' . $this->user . '</login>
                    <password>' . $this->password . '</password>
                    <controlid>' . $controlId . '</controlid>
                    <title>' . $this->user . '</title>
                    <scheduled>NOW</scheduled>
                    <isbulk>false</isbulk>
                </head>
                <body>
                    <msisdn>' . $this->receiver . '</msisdn>
                    <message>' . $this->content . '</message>
                </body>
            </request>';
    }

    public function sendSms($receiver, $content, $controlId = null): array
    {
        $this->receiver = $receiver;
        $this->content = $content;

        $this->setRequestBody($controlId);

        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request(
            'POST',
            $this->url,
            $this->headers,
            $this->body
        );

        try {
            $this->response = $this->parseResponse($client->sendAsync($request)->wait());
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

    private function parseResponse($response): mixed
    {
        $response = simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
        return Json::decode(Json::encode($response), true);
    }

    public function validateResponse($response): bool
    {
        $isSent = ($response['head']['responsecode'] ?? '') == LsimResponseCode::SUCCESS->value;
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
