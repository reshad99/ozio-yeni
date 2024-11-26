<?php

namespace App\Exceptions\V1\User;

use Exception;

class UserNotFoundException extends Exception
{
    protected $message = 'User not found';
}
