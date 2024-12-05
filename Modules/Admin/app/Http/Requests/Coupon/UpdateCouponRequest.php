<?php

namespace Modules\Admin\Http\Requests\Coupon;

use App\Enums\CouponDiscountTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateCouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'limit' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'integer', 'min:1'],
            'code' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', Rule::unique('coupons', 'code')->ignore($this->coupon, 'id')->whereNull('deleted_at')],
            'discount_type' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(CouponDiscountTypeEnum::class)],
            'discount_value' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric'],
            'start_date' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'date', 'before_or_equal:end_date'],
            'start_time' => ['nullable', 'sometimes', 'not_regex:/^\s*$/',],
            'end_date' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'date', 'after_or_equal:start_date'],
            'end_time' => ['nullable', 'sometimes', 'not_regex:/^\s*$/',],
            'active_for_first_order' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
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
