<?php

namespace Modules\Admin\Http\Requests\StoreBranch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStoreBranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:25', Rule::unique('store_branches', 'name')->whereNull('deleted_at')],
            'minimum_order' => ['nullable', 'numeric', 'min:0'],
            'commission' => ['sometimes', 'numeric', 'min:0'],
            'courier_self_service' => ['sometimes', 'numeric', 'in:0,1'],
            'schedule_order' => ['sometimes', 'numeric', 'in:0,1'],
            'take_away' => ['nullable', 'numeric', 'in:0,1'],
            'free_delivery' => ['sometimes', 'numeric', 'in:0,1'],
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
