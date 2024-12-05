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
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
