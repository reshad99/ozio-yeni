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
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('admin::validation.required', ['attribute' => 'Ad']),
            'name.unique' => __('admin::validation.unique', ['attribute' => 'ad']),
            'name.string' => __('admin::validation.string', ['attribute' => 'Ad']),
            'name.max' => __('admin::validation.max', ['attribute' => 'Ad', 'max' => '25']),
            'code.unique' => __('admin::validation.unique', ['attribute' => 'kod']),
            'code.string' => __('admin::validation.string', ['attribute' => 'Kod']),
            'code.max' => __('admin::validation.max', ['attribute' => 'Kod', 'max' => '25']),
            'code.required' => __('admin::validation.required', ['attribute' => 'Kod']),
            'phone_code.unique' => __('admin::validation.unique', ['attribute' => 'telefon kodu']),
            'phone_code.string' => __('admin::validation.string', ['attribute' => 'Telefon kodu']),
            'phone_code.max' => __('admin::validation.max', ['attribute' => 'Telefon kodu', 'max' => '25']),
            'phone_code.required' => __('admin::validation.required', ['attribute' => 'Telefon kodu']),
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
