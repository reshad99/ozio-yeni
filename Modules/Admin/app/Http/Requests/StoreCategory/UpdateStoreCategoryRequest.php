<?php

namespace Modules\Admin\Http\Requests\StoreCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25', Rule::unique('store_categories', 'name')->whereNull('deleted_at')->ignore($this->store_category, 'id')],
            'module_id' => ['required', Rule::exists('modules', 'id')->whereNull('deleted_at')],
            'priority' => ['required', 'integer', 'min:0'],
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
