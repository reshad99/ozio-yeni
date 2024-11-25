<?php

namespace App\Enums;

enum CouponDiscountTypeEnum: string
{
    case PERCENTAGE = 'percentage';
    case FIXED = 'fixed';
}
