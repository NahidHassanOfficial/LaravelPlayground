<?php
namespace App\Enum;

enum OrderStatusEnum: string {
    case PENDING   = 'pending';
    case APPROVED  = 'approved';
    case SHIPPED   = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELED  = 'canceled';

    function getLabel()
    {
        return match ($this) {
            self::PENDING => 'To be processed',
            self::APPROVED => 'Ready for shipping',
            self::SHIPPED => 'Product has been shipped',
            self::DELIVERED => 'Product has been delivered',
            self::CANCELED => 'Order has been canceled',
        };
    }

    function upperCase()
    {
        return strtoupper($this->value);
    }

    function colorLabel()
    {
        return match ($this) {
            self::PENDING => 'bg-gray-100 text-gray-500',
            self::APPROVED => 'bg-yellow-100 text-yellow-500',
            self::SHIPPED => 'bg-blue-100 text-blue-500',
            self::DELIVERED => 'bg-green-100 text-green-500',
            self::CANCELED => 'bg-red-100 text-red-500',
        };
    }
}