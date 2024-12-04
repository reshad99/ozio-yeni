<?php

namespace Modules\Admin\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:25'],
            'password' => ['required', 'max:25'],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages()
    {
        return [
            'email.required' => __('admin::general.validation.required', ['attribute' => 'E-poçt']),
            'password.required' => __('admin::general.validation.required', ['attribute' => 'Şifrə']),
            'email.email' => __('admin::general.validation.email'),
            'password.max' => __('admin::general.validation.max', ['attribute' => 'Şifrə']),
            'email.max' => __('admin::general.validation.max', ['attribute' => 'E-poçt']),
        ];
    }
}
