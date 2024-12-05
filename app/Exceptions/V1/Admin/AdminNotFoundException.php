<?php

namespace App\Exceptions\V1\Admin;

use Exception;

class AdminNotFoundException extends Exception
{
    /**
     * The exception message.
     * @var string $message
     */
    protected $message =  'Admin not found';
}
