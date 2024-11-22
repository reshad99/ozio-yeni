<?php

namespace App\Enums;

enum LsimResponseCode: string
{
    case SUCCESS = '000';
    case PROCESSING = '001';
    case TASK_ALREADY_SUBMITTED = '002';
    case BAD_REQUEST = '100';
    case EMPTY_OPERATION_TYPE = '101';
    case INVALID_OPERATION = '102';
    case EMPTY_LOGIN = '103';
    case EMPTY_PASSWORD = '104';
    case INVALID_AUTHENTICATION = '105';
    case EMPTY_TITLE = '106';
    case INVALID_TITLE = '107';
    case EMPTY_TASK_ID = '108';
    case INVALID_TASK_ID = '109';
    case EMPTY_CONTROL_ID = '110';
    case EMPTY_SCHEDULED_DATE = '111';
    case INVALID_SCHEDULED_DATE = '112';
    case OLD_SCHEDULED_DATE = '113';
    case EMPTY_ISBULK = '114';
    case INVALID_ISBULK = '115';
    case INVALID_BULK_MESSAGE = '116';
    case INVALID_BODY = '117';
    case INSUFFICIENT_UNITS = '118';
    case SYSTEM_ERROR_2XX = '2XX';
    case SYSTEM_ERROR_3XX = '3XX';

    // Mesajları getiren bir metot ekleyelim
    public function getMessage(): string
    {
        return match ($this) {
            self::SUCCESS => "Operation is successful",
            self::PROCESSING => "Processing, report is not ready",
            self::TASK_ALREADY_SUBMITTED => "Task by supplied control id is already submitted",
            self::BAD_REQUEST => "Bad request",
            self::EMPTY_OPERATION_TYPE => "Operation type is empty",
            self::INVALID_OPERATION => "Invalid operation",
            self::EMPTY_LOGIN => "Login is empty",
            self::EMPTY_PASSWORD => "Password is empty",
            self::INVALID_AUTHENTICATION => "Invalid authentication information",
            self::EMPTY_TITLE => "Title is empty",
            self::INVALID_TITLE => "Invalid title",
            self::EMPTY_TASK_ID => "Task id is empty",
            self::INVALID_TASK_ID => "Invalid task id",
            self::EMPTY_CONTROL_ID => "Empty control id",
            self::EMPTY_SCHEDULED_DATE => "Scheduled date is empty",
            self::INVALID_SCHEDULED_DATE => "Invalid scheduled date",
            self::OLD_SCHEDULED_DATE => "Old scheduled date",
            self::EMPTY_ISBULK => "isbulk is empty",
            self::INVALID_ISBULK => "Invalid isbulk value",
            self::INVALID_BULK_MESSAGE => "Invalid bulk message",
            self::INVALID_BODY => "Invalid body",
            self::INSUFFICIENT_UNITS => "Not enough units",
            self::SYSTEM_ERROR_2XX, self::SYSTEM_ERROR_3XX => "System error, report to administrator",
        };
    }
}
