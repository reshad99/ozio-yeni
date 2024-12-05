<?php

namespace Modules\Admin\Http\Requests\UserAddress;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserAddressRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'type' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'phone' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'lng' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:100'],
            'lat' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:100'],
            'user_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('users', 'id')->whereNull('deleted_at')],
            'person_name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'floor' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'apartment' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'road' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'house' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'is_selected' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
            'zone_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('zones', 'id')->whereNull('deleted_at')],
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
