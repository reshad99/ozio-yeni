<?php

namespace Modules\Admin\Http\Requests\Store;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;
use const _PHPStan_c684505c9\__;

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
            'country_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('countries', 'id')->whereNull('deleted_at')],
            'city_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('cities', 'id')->whereNull('deleted_at')],
            'email' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'email', Rule::unique('stores', 'email')->ignore($this->store, 'id')->whereNull('deleted_at')],
            'password' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', Password::min(6), 'confirmed'],
            'lat' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'lng' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'status' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(StatusEnum::class)],
            'store_category_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'have_vegan' => ['nullable', 'sometimes', 'boolean'],
            'have_not_vegan' => ['nullable', 'sometimes', 'boolean'],
            'open_time' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'date_format:H:i:s'],
            'close_time' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'date_format:H:i:s'],
            'zone_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('zones', 'id')->whereNull('deleted_at')],
            'branch_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('branches', 'id')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'module_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Modul']),
            'name.unique' => __('admin::general.validation.unique', ['attribute' => 'Ad']),
            'name.string' => __('admin::general.validation.string', ['attribute' => 'Ad']),
            'name.max' => __('admin::general.validation.max', ['attribute' => 'Ad', 'max' => '25']),
            'store_code.unique' => __('admin::general.validation.unique', ['attribute' => 'Mağaza kodu']),
            'store_code.string' => __('admin::general.validation.string', ['attribute' => 'Mağaza kodu']),
            'store_code.max' => __('admin::general.validation.max', ['attribute' => 'Mağaza kodu', 'max' => '25']),
            'phone.unique' => __('admin::general.validation.unique', ['attribute' => 'Telefon']),
            'phone.string' => __('admin::general.validation.string', ['attribute' => 'Telefon']),
            'phone.max' => __('admin::general.validation.max', ['attribute' => 'Telefon', 'max' => '25']),
            'email.unique' => __('admin::general.validation.unique', ['attribute' => 'Email']),
            'email.email' => __('admin::general.validation.email', ['attribute' => 'Email']),
            'password.string' => __('admin::general.validation.string', ['attribute' => 'Şifrə']),
            'password.min' => __('admin::general.validation.min', ['attribute' => 'Şifrə', 'min' => '6']),
            'password.confirmed' => __('admin::general.validation.confirmed', ['attribute' => 'Şifrə']),
            'country_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Ölkə']),
            'city_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Şəhər']),
            'have_vegan.boolean' => __('admin::general.validation.boolean', ['attribute' => 'Vegan']),
            'have_not_vegan.boolean' => __('admin::general.validation.boolean', ['attribute' => 'Vegan']),
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
