<?php

namespace App\Http\Requests;

use App\Services\IbanService;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,'.auth()->id(),
            ],
            'profile_image' => [
                'nullable',
                'image',
                'max:2048',
            ],
            'bank_account_number' => [
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if ((new IbanService($this->get('bank_account_number')))->validateIban() === false) {
                        $fail(trans('validation.custom.bank_account_number.invalid_bank_account_number'));
                    }
                },
            ],
        ];
    }
}
