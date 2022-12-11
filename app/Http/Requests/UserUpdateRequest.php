<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('user_edit');
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
                Rule::unique('users', 'email')->ignoreModel($this->user),
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
