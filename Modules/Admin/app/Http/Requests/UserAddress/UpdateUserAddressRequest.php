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
            'type' => ['required', 'string', 'max:25'],
            'phone' => ['required', 'string', 'max:25'],
            'lng' => ['required', 'string', 'max:100'],
            'lat' => ['required', 'string', 'max:100'],
            'user_id' => ['required', Rule::exists('users', 'id')->whereNull('deleted_at')],
            'person_name' => ['required', 'string', 'max:25'],
            'floor' => ['nullable', 'string', 'max:25'],
            'apartment' => ['nullable', 'string', 'max:25'],
            'road' => ['nullable', 'string', 'max:25'],
            'house' => ['nullable', 'string', 'max:25'],
            'is_selected' => ['sometimes', 'boolean'],
            'zone_id' => ['nullable', Rule::exists('zones', 'id')->whereNull('deleted_at')],
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
