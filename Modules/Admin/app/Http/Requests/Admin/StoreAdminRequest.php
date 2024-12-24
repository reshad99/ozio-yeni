<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:25', Rule::unique('admins', 'name')->whereNull('deleted_at')],
            'email' => ['required', 'email', 'max:25', Rule::unique('admins', 'email')->whereNull('deleted_at')],
            'password' => ['required', 'max:25', Password::min(8)->max(25), 'confirmed'],
            'country_code' => ['required', 'max:25'],
//            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required', 'string', 'max:25', Rule::unique('admins', 'phone')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('admin::general.validation.required', ['attribute' => 'Adı']),
            'name.unique' => __('admin::general.validation.unique', ['attribute' => 'ad']),
            'name.max' => __('admin::general.validation.max', ['attribute' => 'Adı', 'max' => '25']),
            'email.required' => __('admin::general.validation.required', ['attribute' => 'E-poçt']),
            'password.required' => __('admin::general.validation.required', ['attribute' => 'Şifrə']),
            'email.email' => __('admin::general.validation.email'),
            'email.max' => __('admin::general.validation.max', ['attribute' => 'E-poçt', 'max' => '25']),
            'email.unique' => __('admin::general.validation.unique', ['attribute' => 'E-poçt']),
            'phone.unique' => __('admin::general.validation.unique', ['attribute' => 'Telefon nömrəsi']),
            'password.confirmed' => __('admin::general.validation.confirmed', ['attribute' => 'Şifrə']),
            'password.min' => __('admin::general.validation.min', ['attribute' => 'Şifrə', 'min' => '8']),
            'password.max' => __('admin::general.validation.max', ['attribute' => 'Şifrə', 'max' => '25']),
            'phone.string' => __('admin::general.validation.string', ['attribute' => 'Telefon nömrəsi']),
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
