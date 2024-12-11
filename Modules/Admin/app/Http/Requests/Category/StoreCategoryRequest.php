<?php

namespace Modules\Admin\Http\Requests\Category;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreCategoryRequest extends FormRequest
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
            'priority' => ['required', 'integer', 'min:1'],
            'module_id' => ['required', Rule::exists('modules', 'id')->whereNull('deleted_at')],
            'parent_id' => ['nullable', 'integer', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            '_lft' => ['sometimes', 'integer', 'min:1', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            '_rgt' => ['sometimes', 'integer', 'min:1', Rule::exists('categories', 'id')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('admin::general.validation.required', ['attribute' => 'Kateqoriya']),
            'name.*.required' => __('admin::general.validation.required', ['attribute' => 'Kateqoriya']),
            'name.*.string' => __('admin::general.validation.string', ['attribute' => 'Kateqoriya']),
            'name.*.max' => __('admin::general.validation.max', ['attribute' => 'Kateqoriya', 'max' => '255']),

            'status.enum' => __('admin::general.validation.enum', ['attribute' => 'Status']),
            'featured.in' => __('admin::general.validation.in', ['attribute' => 'Tövsiyə olunan']),

            'priority.required' => __('admin::general.validation.required', ['attribute' => 'Prioritet']),
            'priority.integer' => __('admin::general.validation.integer', ['attribute' => 'Prioritet']),
            'priority.min' => __('admin::general.validation.min', ['attribute' => 'Prioritet', 'min' => '1']),

            'module_id.required' => __('admin::general.validation.required', ['attribute' => 'Modul']),
            'module_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Modul']),

            'parent_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Parent']),
            'parent_id.integer' => __('admin::general.validation.integer', ['attribute' => 'Parent']),

            '_lft.integer' => __('admin::general.validation.integer', ['attribute' => 'Lft']),
            '_rgt.integer' => __('admin::general.validation.integer', ['attribute' => 'Rgt']),

            '_lft.min' => __('admin::general.validation.min', ['attribute' => 'Lft', 'min' => '1']),
            '_rgt.min' => __('admin::general.validation.min', ['attribute' => 'Rgt', 'min' => '1']),

            '_lft.exists' => __('admin::general.validation.exists', ['attribute' => 'Lft']),
            '_rgt.exists' => __('admin::general.validation.exists', ['attribute' => 'Rgt']),
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
