<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(): View
    {
        return view('orders.index');
    }

    public function create(): View
    {
        return view('orders.create', [
            'users' => User::pluck('name', 'id'),
        ]);
    }

    public function store(OrderStoreRequest $request): JsonResponse
    {
        $order = Order::create($request->validated());

        $order->order_items()->createMany($request->order_items);

        if ($request->hasFile('image')) {
            $order->addMediaFromRequest('image')
                ->toMediaCollection('order_image');
        }

        session()->flash('success', trans('orders.order_created'));

        return response()->json([
            'redirect' => route('orders.index'),
        ]);
    }

    public function show(Order $order)
    {
    }

    public function edit(Order $order)
    {
    }

    public function update(Request $request, Order $order)
    {
    }

    public function destroy(Order $order)
    {
    }
}
