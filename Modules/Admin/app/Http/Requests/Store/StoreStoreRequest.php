<?php

namespace Modules\Admin\Http\Requests\Store;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

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
            'rating' => ['sometimes', 'numeric', 'min:1', 'max:5'],
            'store_category_id' => ['sometimes', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'have_vegan' => ['sometimes', 'numeric', 'min:0', 'max:1'],
            'have_not_vegan' => ['sometimes', 'numeric', 'min:0', 'max:1'],
            'open_time' => ['required', 'date_format:H:i:s'],
            'close_time' => ['required', 'date_format:H:i:s'],
            'zone_id' => ['required', Rule::exists('zones', 'id')->whereNull('deleted_at')],
            'branch_id' => ['sometimes', Rule::exists('branches', 'id')->whereNull('deleted_at')],
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
