<?php

namespace Modules\Admin\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTagRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('tags', 'name')->whereNull('deleted_at')->ignore($this->tag, 'id')],
            'color' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'priority' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'min:0'],
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
