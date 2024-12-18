<?php

namespace Modules\Admin\Http\Requests\Currency;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateCurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/','max:25', Rule::unique('currencies', 'name')->whereNull('deleted_at')->ignore($this->currency, 'id')],
            'code' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('currencies', 'code')->whereNull('deleted_at')->ignore($this->currency, 'id')],
            'symbol' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('currencies', 'symbol')->whereNull('deleted_at')->ignore($this->currency, 'id')],
            'status' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(StatusEnum::class)],
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
