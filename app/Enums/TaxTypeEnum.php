<?php

namespace App\Enums;

enum TaxTypeEnum: string
{
    case PERCENTAGE = 'percentage';
    case FIXED = 'fixed';
}
