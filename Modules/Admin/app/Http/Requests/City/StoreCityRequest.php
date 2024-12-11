<?php

namespace Modules\Admin\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25', Rule::unique('cities', 'name')->whereNull('deleted_at')],
            'country_id' => ['required', Rule::exists('countries', 'id')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.unique' => __('admin::validation.unique', ['attribute' => 'ad']),
            'name.string' => __('admin::validation.string', ['attribute' => 'Ad']),
            'name.max' => __('admin::validation.max', ['attribute' => 'Ad', 'max' => '25']),
            'name.required' => __('admin::validation.required', ['attribute' => 'Ad']),
            'country_id.exists' => __('admin::validation.exists', ['attribute' => 'Ölkə']),
            'country_id.required' => __('admin::validation.required', ['attribute' => 'Ölkə']),
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
