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
            'name' => ['required', 'string', 'max:25', Rule::unique('tags', 'name')->whereNull('deleted_at')->ignore($this->tag, 'id')],
            'color' => ['nullable', 'string', 'max:25'],
            'priority' => ['required', 'numeric', 'min:0'],
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
