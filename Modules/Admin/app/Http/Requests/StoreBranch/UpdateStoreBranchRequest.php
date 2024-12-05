<?php

namespace Modules\Admin\Http\Requests\StoreBranch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreBranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('store_branches', 'name')->whereNull('deleted_at')->ignore($this->store_branch, 'id')],
            'minimum_order' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0'],
            'commission' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0'],
            'courier_self_service' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'in:0,1'],
            'schedule_order' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'in:0,1'],
            'take_away' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'in:0,1'],
            'free_delivery' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'in:0,1'],
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
