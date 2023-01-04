<?php

namespace App\Observers;

use App\Models\OrderItem;
use App\Models\PaymentStatus;

class OrderItemObserver
{
    public function creating(OrderItem $orderItem): void
    {
        $orderItem->payment_status = PaymentStatus::Pending;
    }

}
