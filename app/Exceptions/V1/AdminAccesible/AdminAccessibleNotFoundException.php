<?php

namespace App\Exceptions\V1\AdminAccesible;

use Exception;

class AdminAccessibleNotFoundException extends Exception
{
    /**
     * The exception message.
     * @var string $message
     */
    protected $message =  'AdminAccessible not found';
}
