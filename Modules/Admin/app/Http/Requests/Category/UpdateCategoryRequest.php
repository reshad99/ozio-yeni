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
            'priority' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'min:1'],
            'module_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('modules', 'id')->whereNull('deleted_at')],
            'parent_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            '_lft' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'integer', 'min:1'],
            '_rgt' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'integer', 'min:1'],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.*.required' => __('admin::general.validation.required', ['attribute' => 'Kateqoriya']),
            'name.*.string' => __('admin::general.validation.string', ['attribute' => 'Kateqoriya']),
            'name.*.max' => __('admin::general.validation.max', ['attribute' => 'Kateqoriya', 'max' => '255']),
            'name.*.not_regex' => __('admin::general.validation.not_regex', ['attribute' => 'Kateqoriya', 'regex' => 'boşluq']),
            'status.enum' => __('admin::general.validation.enum', ['attribute' => 'Status']),
            'featured.in' => __('admin::general.validation.in', ['attribute' => 'Tövsiyə olunan']),
            'priority.min' => ['min' => __('admin::general.validation.min', ['attribute' => 'Prioritet', 'min' => '1'])],
            'module_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Modul']),
            'parent_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Üst Kateqoriya']),
            '_lft.integer' => __('admin::general.validation.integer', ['attribute' => 'Lft']),
            '_rgt.integer' => __('admin::general.validation.integer', ['attribute' => 'Rgt']),
            '_lft.min' => __('admin::general.validation.min', ['attribute' => 'Lft', 'min' => '1']),
            '_rgt.min' => __('admin::general.validation.min', ['attribute' => 'Rgt', 'min' => '1']),
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
