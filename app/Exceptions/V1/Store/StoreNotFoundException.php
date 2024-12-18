<?php

namespace App\Exceptions\V1\Store;

use Exception;

class StoreNotFoundException extends Exception
{
    /**
     * @var string $message
     */
    protected $message = 'Store not found';
}
