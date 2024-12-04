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
            'name' => ['required', 'max:25', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            //@todo maybe ignore will not work
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->admin, 'id')->whereNull('deleted_at')],
            'password' => ['nullable', 'max:25', Password::min(8)->max(25)->numbers()->mixedCase()],
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
