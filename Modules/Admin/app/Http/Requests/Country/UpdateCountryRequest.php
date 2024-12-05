<?php

namespace Modules\Admin\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u', Rule::unique('countries', 'name')->whereNull('deleted_at')->ignore($this->country, 'id')],
            'code' => ['required', 'string', 'max:25', Rule::unique('countries', 'code')->whereNull('deleted_at')->ignore($this->country, 'id')],
            'phone_code' => ['required', 'string', 'max:25', Rule::unique('countries', 'phone_code')->whereNull('deleted_at')->ignore($this->country, 'id')],
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
