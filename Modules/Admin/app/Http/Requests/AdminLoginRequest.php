<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:25'],
            'password' => ['required', 'max:25'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

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
