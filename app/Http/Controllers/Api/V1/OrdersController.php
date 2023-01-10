<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrdersController extends Controller
{
    public function show(Order $order): OrderResource
    {
        return OrderResource::make($order->load('order_items', 'media'));
    }
}
