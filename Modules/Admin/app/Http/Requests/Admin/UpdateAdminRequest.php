<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('admins', 'name')->ignore($this->admin, 'id')->whereNull('deleted_at')],
            'password' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'confirmed', 'max:25', Password::min(8)->max(25)->numbers()->mixedCase()],
            'password_confirmation' => ['required_with:password', 'same:password'],
            'email' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'max:25', 'email', Rule::unique('admins', 'email')->ignore($this->admin, 'id')->whereNull('deleted_at')],
            'phone' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:25', Rule::unique('admins', 'phone')->ignore($this->admin, 'id')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.max' => __('admin::general.validation.max', ['attribute' => 'Ad']),
            'name.unique' => __('admin::general.validation.unique', ['attribute' => 'ad']),
            'name.string' => __('admin::general.validation.string', ['attribute' => 'Ad']),
            'name.not_regex' => __('admin::general.validation.not_regex', ['attribute' => 'Ad', 'regex' => 'boşluq']),
            'password.min' => __('admin::general.validation.min', ['attribute' => 'Şifrə', 'min' => '8']),
            'password.max' => __('admin::general.validation.max', ['attribute' => 'Şifrə', 'max' => '25']),
            'email.email' => __('admin::general.validation.email'),
            'email.not_regex' => __('admin::general.validation.not_regex', ['attribute' => 'E-poçt', 'regex' => 'boşluq']),
            'email.max' => __('admin::general.validation.max', ['attribute' => 'E-poçt', 'max' => '25']),
            'email.unique' => __('admin::general.validation.unique', ['attribute' => 'E-poçt']),
            'password.confirmed' => __('admin::general.validation.confirmed', ['attribute' => 'Şifrə']),
            'password_confirmation.same' => __('admin::general.validation.same', ['attribute' => 'Şifrə']),
            'phone.max' => __('admin::general.validation.max', ['attribute' => 'Telefon nömrəsi', 'max' => '25']),
            'phone.string' => __('admin::general.validation.string', ['attribute' => 'Telefon nömrəsi']),
            'phone.not_regex' => __('admin::general.validation.not_regex', ['attribute' => 'Telefon nömrəsi', 'regex' => 'boşluq']),
            'phone.unique' => __('admin::general.validation.unique', ['attribute' => 'Telefon nömrəsi']),
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
