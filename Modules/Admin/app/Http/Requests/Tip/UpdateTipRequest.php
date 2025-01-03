<?php

namespace Modules\Admin\Http\Requests\Tip;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTipRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'value' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0'],
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u', Rule::unique('tips', 'name')->whereNull('deleted_at')->ignore($this->tip, 'id')],
            'currency_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('currencies', 'id')->whereNull('deleted_at')],
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
