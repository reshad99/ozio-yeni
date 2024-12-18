<?php

namespace Modules\Admin\Http\Requests\Courier;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateCourierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'phone' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('couriers', 'phone')->ignore($this->courier, 'id')->whereNull('deleted_at')],
            'email' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'email', 'max:255', Rule::unique('couriers', 'email')->ignore($this->courier, 'id')->whereNull('deleted_at')],
            'store_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('stores', 'id')->whereNull('deleted_at')],
            'password' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', Password::min(6), 'confirmed'],
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
