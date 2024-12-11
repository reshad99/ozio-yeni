<?php

namespace Modules\Admin\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'email' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'email', Rule::unique('users', 'email')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'country_code' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25'],
            'phone' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'string', 'max:25', Rule::unique('users', 'phone')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'bonus_card_no' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('users', 'bonus_card_no')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'ref_code' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('users', 'ref_code')->ignore($this->user, 'id')->whereNull('deleted_at')],
            'want_notification' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.max' => __('admin::validation.max', ['attribute' => 'Ad', 'max' => '25']),
            'name.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Ad', 'regex' => 'boşluq']),
            'email.email' => __('admin::validation.email', ['attribute' => 'E-mail']),
            'email.unique' => __('admin::validation.unique', ['attribute' => 'E-mail']),
            'email.not_regex' => __('admin::validation.not_regex', ['attribute' => 'E-mail', 'regex' => 'boşluq']),
            'country_code.max' => __('admin::validation.max', ['attribute' => 'Telefon kodu', 'max' => '25']),
            'country_code.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Telefon kodu', 'regex' => 'boşluq']),
            'phone.max' => __('admin::validation.max', ['attribute' => 'Telefon', 'max' => '25']),
            'phone.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Telefon', 'regex' => 'boşluq']),
            'phone.string' => __('admin::validation.numeric', ['attribute' => 'Telefon']),
            'phone.unique' => __('admin::validation.unique', ['attribute' => 'Telefon']),
            'bonus_card_no.max' => __('admin::validation.max', ['attribute' => 'Bonus kart nömrəsi', 'max' => '25']),
            'bonus_card_no.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Bonus kart nömrəsi', 'regex' => 'boşluq']),
            'bonus_card_no.unique' => __('admin::validation.unique', ['attribute' => 'Bonus kart nömrəsi']),
            'ref_code.max' => __('admin::validation.max', ['attribute' => 'Referans kodu', 'max' => '25']),
            'ref_code.not_regex' => __('admin::validation.not_regex', ['attribute' => 'Referans kodu', 'regex' => 'boşluq']),
            'ref_code.unique' => __('admin::validation.unique', ['attribute' => 'Referans kodu']),
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
