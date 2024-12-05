<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:25', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            'email' => ['required', 'email', Rule::unique('admins', 'email')->whereNull('deleted_at')],
            'password' => ['required', 'max:25', Password::min(8)->max(25)->numbers()->mixedCase()],
            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required', 'string', 'max:25', Rule::unique('admins', 'phone')->whereNull('deleted_at')],
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
