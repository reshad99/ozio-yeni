<?php

namespace Modules\Admin\Http\Requests\Module;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateModuleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25', Rule::unique('modules', 'name')->ignore($this->module, 'id')->whereNull('deleted_at')],
            'status'=>['sometimes',new Enum(StatusEnum::class)]
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
