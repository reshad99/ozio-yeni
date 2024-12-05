<?php

namespace Modules\Admin\Http\Requests\Zone;

use App\Enums\StatusEnum;
use App\Enums\ZoneTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateZoneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'type' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(ZoneTypeEnum::class)],
            'coordinates' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/',],
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
