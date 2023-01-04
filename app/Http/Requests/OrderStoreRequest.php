<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'owner_id' => [
                'required',
                'exists:users,id',
            ],
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'image' => [
                'nullable',
                'image',
                'max:2048',
            ],
            'order_items' => [
                'required',
                'array',
            ],
            'order_items.*.user_id' => [
                'required',
                'exists:users,id',
            ],
            'order_items.*.name' => [
                'required',
                'string',
                'max:255',
            ],
            'order_items.*.price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'order_items.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'owner_id' => trans('orders.order_owner'),
            'title' => trans('orders.order_receipt'),
            'order_items.*.user_id' => trans('usersManagement/users.user'),
            'order_items.*.title' => trans('validation.attributes.title'),
            'order_items.*.price' => trans('validation.attributes.price'),
            'order_items.*.quantity' => trans('validation.attributes.quantity'),
        ];
    }

}
