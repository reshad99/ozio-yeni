<?php

namespace Modules\Admin\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'email' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'email', Rule::unique('users', 'email')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'country_code' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'phone' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'max:25', Rule::unique('users', 'phone')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'bonus_card_no' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('users', 'bonus_card_no')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'ref_code' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('users', 'ref_code')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'want_notification' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
