<?php

namespace Modules\Admin\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use const _PHPStan_c684505c9\__;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:25'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->whereNull('deleted_at')],
            'country_code' => ['required', 'max:25'],
            'phone' => ['required', 'string', 'max:25', Rule::unique('users', 'phone')->whereNull('deleted_at')],
            'bonus_card_no' => ['nullable', 'max:25', Rule::unique('users', 'bonus_card_no')->whereNull('deleted_at')],
            'ref_code' => ['nullable', 'max:25', Rule::unique('users', 'ref_code')->whereNull('deleted_at')],
            'want_notification' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('admin::validation.required', ['attribute' => 'Ad']),
            'name.max' => __('admin::validation.max', ['attribute' => 'Ad', 'max' => '25']),
            'email.required' => __('admin::validation.required', ['attribute' => 'E-mail']),
            'email.email' => __('admin::validation.email', ['attribute' => 'E-mail']),
            'email.unique' => __('admin::validation.unique', ['attribute' => 'E-mail']),
            'country_code.required' => __('admin::validation.required', ['attribute' => 'Telefon kodu']),
            'country_code.max' => __('admin::validation.max', ['attribute' => 'Telefon kodu', 'max' => '25']),
            'phone.required' => __('admin::validation.required', ['attribute' => 'Telefon']),
            'phone.string' => __('admin::validation.string', ['attribute' => 'Telefon']),
            'phone.max' => __('admin::validation.max', ['attribute' => 'Telefon', 'max' => '25']),
            'phone.unique' => __('admin::validation.unique', ['attribute' => 'Telefon']),
            'bonus_card_no.max' => __('admin::validation.max', ['attribute' => 'Bonus kart nömrəsi', 'max' => '25']),
            'bonus_card_no.unique' => __('admin::validation.unique', ['attribute' => 'Bonus kart nömrəsi']),
            'ref_code.max' => __('admin::validation.max', ['attribute' => 'Referans kodu', 'max' => '25']),
            'ref_code.unique' => __('admin::validation.unique', ['attribute' => 'Referans kodu']),
            'want_notification.required' => __('admin::validation.required', ['attribute' => 'Xəbərdarlıq']),
            'want_notification.boolean' => __('admin::validation.boolean', ['attribute' => 'Xəbərdarlıq']),
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
