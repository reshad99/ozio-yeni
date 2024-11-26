<?php

namespace App\Exceptions\V1;

use Exception;

class NotFoundException extends Exception
{
    /**
     * The exception message.
     * @var string $message
     */
    protected $message = 'Not found';
}
