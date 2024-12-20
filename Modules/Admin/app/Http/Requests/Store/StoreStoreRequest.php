<?php

namespace Modules\Admin\Http\Requests\Store;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;
use const _PHPStan_c684505c9\__;

class StoreStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'module_id' => ['required', Rule::exists('modules', 'id')->whereNull('deleted_at')],
            'name' => ['required', 'string', 'max:25', Rule::unique('stores', 'name')->whereNull('deleted_at')],
            'store_code' => ['required', 'string', 'max:25', Rule::unique('stores', 'store_code')->whereNull('deleted_at')],
            'currency_id' => ['required', Rule::exists('currencies', 'id')->whereNull('deleted_at')],
            'phone' => ['required', 'string', 'max:25', Rule::unique('stores', 'phone')->whereNull('deleted_at')],
            'city_id' => ['required', Rule::exists('cities', 'id')->whereNull('deleted_at')],
            'email' => ['sometimes', 'email', Rule::unique('stores', 'email')->whereNull('deleted_at')],
            'password' => ['sometimes', 'string', Password::min(6), 'confirmed'],
            'device_id' => ['sometimes', 'string', 'max:25', Rule::unique('stores', 'device_id')->whereNull('deleted_at')],
            'lat' => ['required', 'string', 'max:25'],
            'lng' => ['required', 'string', 'max:25'],
            'status' => ['sometimes', new Enum(StatusEnum::class)],
            'store_category_id' => ['sometimes', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'have_vegan' => ['sometimes', 'numeric', 'min:0', 'max:1'],
            'have_not_vegan' => ['sometimes', 'numeric', 'min:0', 'max:1'],
            'open_time' => ['required', 'date_format:H:i:s'],
            'close_time' => ['required', 'date_format:H:i:s'],
            'zone_id' => ['required', Rule::exists('zones', 'id')->whereNull('deleted_at')],
            'branch_id' => ['sometimes', Rule::exists('store_branches', 'id')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'module_id.required' => __('admin::general.validation.required', ['attribute' => 'Modul']),
            'module_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Modul']),
            'name.required' => __('admin::general.validation.required', ['attribute' => 'Ad']),
            'name.unique' => __('admin::general.validation.unique', ['attribute' => 'ad']),
            'name.string' => __('admin::general.validation.string', ['attribute' => 'Ad']),
            'name.max' => __('admin::general.validation.max', ['attribute' => 'Ad']),

            'store_code.required' => __('admin::general.validation.required', ['attribute' => 'Mağaza kodu']),
            'store_code.unique' => __('admin::general.validation.unique', ['attribute' => 'Mağaza kodu']),
            'store_code.string' => __('admin::general.validation.string', ['attribute' => 'Mağaza kodu']),
            'store_code.max' => __('admin::general.validation.max', ['attribute' => 'Mağaza kodu']),

            'currency_id.required' => __('admin::general.validation.required', ['attribute' => 'Valyuta']),
            'currency_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Valyuta']),

            'phone.required' => __('admin::general.validation.required', ['attribute' => 'Telefon nömrəsi']),
            'phone.unique' => __('admin::general.validation.unique', ['attribute' => 'telefon nömrəsi']),
            'phone.string' => __('admin::general.validation.string', ['attribute' => 'Telefon nömrəsi']),
            'phone.max' => __('admin::general.validation.max', ['attribute' => 'Telefon nömrəsi']),

            'city_id.required' => __('admin::general.validation.required', ['attribute' => 'Şəhər']),
            'city_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Şəhər']),

            'email.email' => __('admin::general.validation.email'),
            'email.unique' => __('admin::general.validation.unique', ['attribute' => 'email']),

            'password.string' => __('admin::general.validation.string', ['attribute' => 'Şifrə']),
            'password.min' => __('admin::general.validation.min', ['attribute' => 'Şifrə']),
            'password.confirmed' => __('admin::general.validation.confirmed', ['attribute' => 'Şifrə']),

            'device_id.string' => __('admin::general.validation.string', ['attribute' => 'Cihaz']),
            'device_id.max' => __('admin::general.validation.max', ['attribute' => 'Cihaz']),
            'device_id.unique' => __('admin::general.validation.unique', ['attribute' => 'cihaz']),

            'lat.required' => __('admin::general.validation.required', ['attribute' => 'En']),
            'lat.string' => __('admin::general.validation.string', ['attribute' => 'En']),
            'lat.max' => __('admin::general.validation.max', ['attribute' => 'En']),

            'lng.required' => __('admin::general.validation.required', ['attribute' => 'Uzunluq']),
            'lng.string' => __('admin::general.validation.string', ['attribute' => 'Uzunluq']),
            'lng.max' => __('admin::general.validation.max', ['attribute' => 'Uzunluq']),

            'status.enum' => __('admin::general.validation.enum', ['attribute' => 'Status']),

            'rating.numeric' => __('admin::general.validation.numeric', ['attribute' => 'Reytinq']),
            'rating.min' => __('admin::general.validation.min', ['min' => '1']),
            'rating.max' => __('admin::general.validation.max', ['max' => '5']),

            'store_category_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Kateqoriya']),

            'have_vegan.numeric' => __('admin::general.validation.numeric', ['attribute' => 'Veqanın varlığı']),
            'have_vegan.min' => __('admin::general.validation.min', ['min' => '1']),
            'have_vegan.max' => __('admin::general.validation.max', ['max' => '5']),

            'have_not_vegan.numeric' => __('admin::general.validation.numeric', ['attribute' => 'Veqanın yoxluğu']),
            'have_not_vegan.min' => __('admin::general.validation.min', ['min' => '1']),
            'have_not_vegan.max' => __('admin::general.validation.max', ['max' => '5']),

            'open_time.required' => __('admin::general.validation.required', ['attribute' => 'Açılış zamanı']),
            'open_time.date_format' => __('admin::general.validation.date_format', ['attribute' => 'Açılış zamanı']),

            'close_time.required' => __('admin::general.validation.required', ['attribute' => 'Bağlanma zamanı']),
            'close_time.date_format' => __('admin::general.validation.date_format', ['attribute' => 'Bağlanma zamanı']),

            'zone_id.required' => __('admin::general.validation.required', ['attribute' => 'Zona']),
            'zone_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Zona']),

            'branch_id' => __('admin::general.validation.'),
            'branch_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Filial']),
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
