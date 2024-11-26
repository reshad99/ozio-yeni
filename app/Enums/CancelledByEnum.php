<?php

namespace App\Enums;

enum CancelledByEnum: string
{
    case USER = 'user';
    case STORE = 'store';
    case COURIER = 'courier';
    case ADMIN = 'admin';
}
