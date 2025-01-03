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
            'country_id' => ['required', Rule::exists('countries', 'id')->whereNull('deleted_at')],
            'city_id' => ['required', Rule::exists('cities', 'id')->whereNull('deleted_at')],
            'email' => ['sometimes', 'email', Rule::unique('stores', 'email')->whereNull('deleted_at')],
            'password' => ['sometimes', 'string', Password::min(6), 'confirmed'],
            'lat' => ['required', 'string', 'max:25'],
            'lng' => ['required', 'string', 'max:25'],
            'status' => ['sometimes', new Enum(StatusEnum::class)],
            'store_category_id' => ['sometimes', Rule::exists('store_categories', 'id')->whereNull('deleted_at')],
            'have_vegan' => ['sometimes', 'boolean'],
            'have_not_vegan' => ['sometimes', 'boolean'],
            'open_time' => ['required', 'date_format:H:i'],
            'close_time' => ['required', 'date_format:H:i'],
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

            'country_id.required' => __('admin::general.validation.required', ['attribute' => 'Ölkə']),
            'country_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Ölkə']),

            'city_id.required' => __('admin::general.validation.required', ['attribute' => 'Şəhər']),
            'city_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Şəhər']),

            'email.email' => __('admin::general.validation.email'),
            'email.unique' => __('admin::general.validation.unique', ['attribute' => 'email']),

            'password.string' => __('admin::general.validation.string', ['attribute' => 'Şifrə']),
            'password.min' => __('admin::general.validation.min', ['attribute' => 'Şifrə']),
            'password.confirmed' => __('admin::general.validation.confirmed', ['attribute' => 'Şifrə']),

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

            'have_vegan.boolean' => __('admin::general.validation.boolean', ['attribute' => 'Veqanın varlığı']),

            'have_not_vegan.boolean' => __('admin::general.validation.boolean', ['attribute' => 'Veqanın yoxluğu']),

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


    protected function prepareForValidation()
    {
        $this->merge([
            'have_vegan' => $this->has('have_vegan') ? true : false,
            'have_not_vegan' => $this->has('have_not_vegan') ? true : false,
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
