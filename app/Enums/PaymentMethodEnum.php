<?php

namespace App\Enums;

enum PaymentMethodEnum: string
{
    case CASH = 'cash';
    case WALLET = 'wallet';
    case CARD = 'card';
}
