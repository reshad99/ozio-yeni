<?php

namespace Modules\Admin\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25', Rule::unique('countries', 'name')->whereNull('deleted_at')],
            'code' => ['required', 'string', 'max:25', Rule::unique('countries', 'code')->whereNull('deleted_at')],
            'phone_code' => ['required', 'string', 'max:25', Rule::unique('countries', 'phone_code')->whereNull('deleted_at')],
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
