<?php

namespace App\Enums;

enum OrderStateEnum: string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case PREPARING = 'preparing';
    case DELIVERING = 'delivering';
    case DELIVERED = 'delivered';
    case CANCELED = 'canceled';
    case REJECTED = 'rejected';
    case REFUNDED = 'refunded';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
}
