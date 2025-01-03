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
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('countries', 'name')->whereNull('deleted_at')->ignore($this->country, 'id')],
            'code' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('countries', 'code')->whereNull('deleted_at')->ignore($this->country, 'id')],
            'phone_code' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('countries', 'phone_code')->whereNull('deleted_at')->ignore($this->country, 'id')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.string' => __('admin::validation.string', ['attribute' => 'Ad']),
            'name.max' => __('admin::validation.max', ['attribute' => 'Ad', 'max' => '25']),
            'name.unique' => __('admin::validation.unique', ['attribute' => 'ad']),
            'code.unique' => __('admin::validation.unique', ['attribute' => 'kod']),
            'phone_code.unique' => __('admin::validation.unique', ['attribute' => 'telefon kodu']),
            'name.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Ad', 'regex' => 'boşluq']),
            'code.string' => __('admin::validation.string', ['attribute' => 'Kod']),
            'code.max' => __('admin::validation.max', ['attribute' => 'Kod', 'max' => '25']),
            'code.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Kod', 'regex' => 'boşluq']),
            'phone_code.string' => __('admin::validation.string', ['attribute' => 'Telefon kodu']),
            'phone_code.max' => __('admin::validation.max', ['attribute' => 'Telefon kodu', 'max' => '25']),
            'phone_code.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Telefon kodu', 'regex' => 'boşluq']),
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
