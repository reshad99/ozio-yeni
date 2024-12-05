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
            'name' => ['required', 'array'],
            'name.*' => ['required', 'string', 'max:255'],
            'status' => ['sometimes', new Enum(StatusEnum::class)],
            'featured' => ['sometimes', 'in:0,1'],
            'priority' => ['required', 'integer', 'min:0'],
            'module_id' => ['required', Rule::exists('modules', 'id')->whereNull('deleted_at')],
            'parent_id' => ['nullable', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            '_lft' => ['sometimes', 'integer', 'min:0'],
            '_rgt' => ['sometimes', 'integer', 'min:0'],
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
