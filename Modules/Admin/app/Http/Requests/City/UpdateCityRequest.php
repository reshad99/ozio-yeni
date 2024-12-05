<?php

namespace Modules\Admin\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('cities', 'name')->ignore($this->city, 'id')->whereNull('deleted_at')],
            'country_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('countries', 'id')->whereNull('deleted_at')],
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
