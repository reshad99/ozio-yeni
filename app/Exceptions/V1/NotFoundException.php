<?php

namespace App\Exceptions\V1;

use Exception;

class NotFoundException extends Exception
{
    protected $message = 'Not found';
}
