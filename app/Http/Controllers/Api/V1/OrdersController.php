<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrdersController extends Controller
{
    public function show(Order $order)
    {
        return $order;
    }
}
