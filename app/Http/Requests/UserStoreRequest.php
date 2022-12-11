<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('user_create');
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*' => [
                'required',
                'exists:roles,id',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'roles.*' => trans('usersManagement/roles.roles'),
        ];
    }
}
