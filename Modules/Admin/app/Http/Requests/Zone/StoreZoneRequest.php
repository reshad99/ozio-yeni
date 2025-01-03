<?php

namespace Modules\Admin\Http\Requests\Zone;

use App\Enums\StatusEnum;
use App\Enums\ZoneTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreZoneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'type' => [new Enum(ZoneTypeEnum::class)],
            'coordinates' => ['required','string'],
            'status' => ['required', new Enum(StatusEnum::class)],
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
