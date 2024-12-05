<?php

namespace Modules\Admin\Http\Requests\Category;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateCategoryRequest extends FormRequest
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
            'status' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(StatusEnum::class)],
            'featured' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'in:0,1'],
            'priority' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'min:0'],
            'module_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('modules', 'id')->whereNull('deleted_at')],
            'parent_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            '_lft' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0'],
            '_rgt' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0'],
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
