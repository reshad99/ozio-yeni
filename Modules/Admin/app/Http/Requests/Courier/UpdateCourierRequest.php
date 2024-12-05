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
            'name' => ['required', 'string', 'max:25'],
            'phone' => ['required', 'string', 'max:25', Rule::unique('couriers', 'phone')->ignore($this->courier, 'id')->whereNull('deleted_at')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('couriers', 'email')->ignore($this->courier, 'id')->whereNull('deleted_at')],
            'store_id' => ['required', Rule::exists('stores', 'id')->whereNull('deleted_at')],
            'password' => ['nullable', 'string', Password::min(6), 'confirmed'],
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
