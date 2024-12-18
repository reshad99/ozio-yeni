<?php

namespace Modules\Admin\Http\Requests\Barcode;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBarcodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'store_product_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'integer', Rule::exists('store_products', 'id')->whereNull('deleted_at')],
            'barcode' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', Rule::unique('store_product_barcodes', 'barcode')->ignore($this->barcode, 'id')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'store_product_id.integer' => __('admin::general.validation.integer', ['attribute' => 'Məhsul']),
            'store_product_id.not_regex' => __('admin::general.validation.not_regex', ['attribute' => 'Məhsul', 'regex' => 'boşluq']),
            'store_product_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Məhsul']),
            'barcode.not_regex' => __('admin::general.validation.not_regex', ['attribute' => 'Barkod', 'regex' => 'boşluq']),
            'barcode.unique' => __('admin::general.validation.unique', ['attribute' => 'barkod']),
            'barcode.string' => __('admin::general.validation.string', ['attribute' => 'Barkod']),
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
