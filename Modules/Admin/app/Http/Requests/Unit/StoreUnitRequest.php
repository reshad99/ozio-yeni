<?php

namespace Modules\Admin\Http\Requests\Unit;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreUnitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.*' => ['required', 'string', 'max:255'],
            'unit_type_id' => ['required', Rule::exists('unit_types', 'id')->whereNull('deleted_at')],
            'symbol' => ['required', 'string', 'max:255'],
            'conversion' => ['required', 'string', 'max:255'],
            'status' => ['sometimes', new Enum(StatusEnum::class)]
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
