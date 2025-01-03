<?php

namespace Modules\Admin\Http\Requests\Courier;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreCourierRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'phone' => ['required', 'string', 'max:25', Rule::unique('couriers', 'phone')->whereNull('deleted_at')],
            'email' => ['required', 'email', Rule::unique('couriers', 'email')->whereNull('deleted_at')],
            'store_id' => ['required', Rule::exists('stores', 'id')->whereNull('deleted_at')],
            'password' => ['required', 'string', Password::min(6)],
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
