<?php

namespace Modules\Admin\Http\Requests\Store;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

class UpdateStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'module_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('modules', 'id')->whereNull('deleted_at')],
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('stores', 'name')->ignore($this->store, 'id')->whereNull('deleted_at')],
            'store_code' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('stores', 'store_code')->ignore($this->store, 'id')->whereNull('deleted_at')],
            'currency_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('currencies', 'id')->whereNull('deleted_at')],
            'phone' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('stores', 'phone')->ignore($this->store, 'id')->whereNull('deleted_at')],
            'city_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('cities', 'id')->whereNull('deleted_at')],
            'email' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'email', Rule::unique('stores', 'email')->ignore($this->store, 'id')->whereNull('deleted_at')],
            'password' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', Password::min(6), 'confirmed'],
            'device_id' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('stores', 'device_id')->ignore($this->store, 'id')->whereNull('deleted_at')],
            'lat' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'lng' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'status' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(StatusEnum::class)],
            'rating' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:1', 'max:5'],
            'store_category_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'have_vegan' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0', 'max:1'],
            'have_not_vegan' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0', 'max:1'],
            'open_time' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'date_format:H:i:s'],
            'close_time' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'date_format:H:i:s'],
            'zone_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('zones', 'id')->whereNull('deleted_at')],
            'branch_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('branches', 'id')->whereNull('deleted_at')],
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
