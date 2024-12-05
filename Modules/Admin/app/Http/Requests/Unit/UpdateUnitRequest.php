<?php

namespace Modules\Admin\Http\Requests\Unit;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateUnitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'array'],
            'name.*' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:255'],
            'unit_type_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('unit_types', 'id')->whereNull('deleted_at')],
            'symbol' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:255'],
            'conversion' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:255'],
            'status' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(StatusEnum::class)]
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
