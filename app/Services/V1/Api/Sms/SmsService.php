<?php

namespace App\Services\V1\Sms;

use App\Enums\SmsText;
use App\Jobs\SmsBulk;
use App\Models\SmsLog;
use Illuminate\Support\Facades\Log;
use Nette\Utils\Json;

/**
 * SmsService class is aiming to handle the "send sms"
 * using any gateway implements SmsGateway interface.
 */
class SmsService
{
    protected $gateway;

    /**
     * Whatever pattern you use, please keep VAR_NAME to be overwritten
     *
     * Bu constant-da pattern-i dəyişmək istədikdə VAR_NAME açarına toxunmayın
     */
    const INTERPOLATION_PATTERN = '@{VAR_NAME}';

    function __construct(SmsGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function setGateway(SmsGateway $gateway): void
    {
        $this->gateway = $gateway;
    }

    /**
     * Sms execute method
     * Method first evaluates the sms text with provided variables (optional).
     * Then, after successfully sending the sms it inserts a new row to sms_logs table
     *
     * @param string|int $receiver
     * @param SmsText $sms Either raw sms text or id from sms_texts table
     * @param array $variables
     * @return boolean
     *
     * Example usage:
     * $gateway = new Lsim();
     * $isSent = (new SmsService($gateway))->send($receiver, $content);
     */
    public function execute($receiver, SmsText $sms, array $variables = []): bool
    {
        $smsText = $sms->getText();

        // Evaluate the variables in the sms
        self::evaluateSmsText($smsText, $variables);

        $receiver = getCleanNumber($receiver);

        $result = $this->gateway->sendSms($receiver, $smsText);
        $this->log($result);
        $this->storeSmsLog(compact('sms', 'variables', 'result', 'receiver'));

        return $result['status'];
    }

    /**
     * Sms send method
     * Method adds the process to queue
     *
     * @param string|int $receiver
     * @param string|int $sms Either raw sms text or id from sms_texts table
     * @param array $variables
     * @return boolean
     *
     * Example usage:
     * $gateway = new Lsim();
     * $isSent = (new SmsService($gateway))->send($receiver, $content);
     */
    public function send($receiver, string|int $sms, array $variables = []): bool
    {
        $receiver = getCleanNumber($receiver);
        SmsBulk::dispatch(new SmsService($this->gateway), compact('receiver', 'sms', 'variables'));
        return true;
    }

    /**
     * Send multiple smses in a row (using Laravel jobs)
     *
     * @param array $messages
     * $messages = [
     *   [
     *     'receiver'=>'994551112233',
     *     'sms'=>'The message to the @{customer}',
     *     'variables'=>[
     *       'customer'=>'Turgay Ali'
     *     ]
     *   ],
     * ]
     * @return bool
     *
     * Example usage:
     * $gateway = new Lsim();
     * $isSent = (new SmsService($gateway))->sendBulk($messages);
     */
    public function sendBulk(array $messages)
    {
        $time = time() . rand(10, 99);
        foreach ($messages as $message) {
            $message['controlid'] = $time++;
            SmsBulk::dispatch((new SmsService($this->gateway)), $message);
        }
        return true;
    }

    /**
     * Store sms log
     *
     * @param array $data
     * @return void
     */
    private function storeSmsLog(array $data)
    {
        $insert['class'] = self::getCallingClass();
        $insert['destination_number'] = $data['receiver'];
        $insert['variables'] = Json::encode($data['variables']);

        $request = request();
        $insert['trigger_request'] = Json::encode([
            'url' => $request->url(),
            'headers' => $request->headers->all(),
            'body' => $request->all()
        ]);
        $insert['api_response'] = Json::encode($data['result']);
        $insert['status'] = $data['result']['status'] ? 1 : 2;

        is_numeric($data['sms']) ? $insert['sms_text_id'] = $data['sms'] : $insert['sms_raw_text'] = $data['sms'];
        SmsLog::create($insert);
    }

    /**
     * Determine which class awokes this
     *
     * @return string
     */
    private static function getCallingClass()
    {

        //get the trace
        $trace = debug_backtrace();

        // Get the class that is asking for who awoke it
        $class = self::class;

        // +1 to i cos we have to account for calling this function
        for ($i = 1; $i < count($trace); $i++) {
            if (isset($trace[$i])) // is it set?
                if ($class != $trace[$i]['class']) // is it a different class
                    return $trace[$i]['class'];
        }
        return $class;
    }

    /**
     * The methods apply dynamic data to the text
     *
     * @param string &$content
     * @param array $variables
     * @return string
     */
    public static function evaluateSmsText(string &$content, array $variables): string
    {
        foreach ($variables as $variable => $value) {
            $varKey = str_replace('VAR_NAME', $variable, self::INTERPOLATION_PATTERN);
            $content = str_replace($varKey, $value, $content);
        }
        return $content;
    }

    /**
     * Log the sent sms
     *
     * @param array $result
     * @return void
     */
    private function log($result)
    {
        $logMessage = 'Send SMS, receiver: '
            . Json::encode($this->gateway->getReceiver())
            . ' content: '
            . Json::encode($this->gateway->getContent());

        if ($result['status']) {
            Log::channel('sms')
                ->notice($logMessage);
        } else {
            Log::channel('sms')
                ->warning(
                    $logMessage
                        . '. Exception message : '
                        . $result['message']
                );
        }
    }
}
