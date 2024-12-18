<?php

namespace App\Exceptions;

use Exception;

class ExceptionResponse extends Exception
{
    protected $code = 400;

}
