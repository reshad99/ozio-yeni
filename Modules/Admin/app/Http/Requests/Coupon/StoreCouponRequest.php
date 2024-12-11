<?php

namespace Modules\Admin\Http\Requests\Coupon;

use App\Enums\CouponDiscountTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreCouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'limit' => ['required', 'integer', 'min:1'],
            'code' => ['required', 'string', Rule::unique('coupons', 'code')->whereNull('deleted_at')],
            'discount_type' => ['required', new Enum(CouponDiscountTypeEnum::class)],
            'discount_value' => ['required', 'numeric'],
            'start_date' => ['required', 'date', 'before_or_equal:end_date'],
            'start_time' => ['required'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'end_time' => ['required'],
            'active_for_first_order' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'limit.required' => __('admin::validation.required', ['attribute' => 'Limit']),
            'limit.integer' => __('admin::validation.integer', ['attribute' => 'Limit']),
            'limit.min' => __('admin::validation.min', ['attribute' => 'Limit', 'min' => '1']),
            'code.required' => __('admin::validation.required', ['attribute' => 'Kod']),
            'code.string' => __('admin::validation.string', ['attribute' => 'Kod']),
            'code.unique' => __('admin::validation.unique', ['attribute' => 'kod']),
            'discount_type.required' => __('admin::validation.required', ['attribute' => 'Endirim tipi']),
            'discount_type.enum' => __('admin::validation.enum', ['attribute' => 'Endirim tipi']),
            'discount_value.required' => __('admin::validation.required', ['attribute' => 'Endirim qiyməti']),
            'discount_value.numeric' => __('admin::validation.numeric', ['attribute' => 'Endirim qiyməti']),
            'start_date.required' => __('admin::validation.required', ['attribute' => 'Başlama tarixi']),
            'start_date.date' => __('admin::validation.date', ['attribute' => 'Başlama tarixi']),
            'start_date.before_or_equal' => __('admin::validation.before_or_equal', ['attribute' => 'Başlama', 'date' => 'Bitmə']),
            'start_time.required' => __('admin::validation.required', ['attribute' => 'Başlama saati']),
            'end_date.required' => __('admin::validation.required', ['attribute' => 'Bitmə tarixi']),
            'end_date.date' => __('admin::validation.date', ['attribute' => 'Bitmə tarixi']),
            'end_date.after_or_equal' => __('admin::validation.after_or_equal', ['attribute' => 'Bitmə', 'date' => 'Başlama']),
            'end_time.required' => __('admin::validation.required', ['attribute' => 'Bitmə saati']),
            'active_for_first_order.boolean' => __('admin::validation.boolean', ['attribute' => 'Birinci sifariş üçün aktiv']),
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
