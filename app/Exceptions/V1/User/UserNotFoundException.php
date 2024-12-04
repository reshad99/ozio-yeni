<?php

namespace App\Exceptions\V1\User;

use Exception;

class UserNotFoundException extends Exception
{
    /**
     * The exception message.
     * @var string $message
     */
    protected $message = 'User not found';
}
