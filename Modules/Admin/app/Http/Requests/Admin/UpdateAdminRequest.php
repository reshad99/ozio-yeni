<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'password' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Password::min(8)->max(25)->numbers()->mixedCase()],
            'password_confirmation' => ['required_with:password', 'same:password'],
            'email' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'email', Rule::unique('admins', 'email')->ignore($this->admin, 'id')->whereNull('deleted_at')],
            'phone' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('admins', 'phone')->ignore($this->admin, 'id')->whereNull('deleted_at')],
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
