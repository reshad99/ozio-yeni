<?php

namespace Modules\Admin\Http\Requests\Barcode;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBarcodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'store_product_id' => ['required', 'integer', Rule::exists('store_products', 'id')->whereNull('deleted_at')],
            'barcode' => ['required', 'string', Rule::unique('store_product_barcodes', 'barcode')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'store_product_id.required' => __('admin::general.validation.required', ['attribute' => 'Məhsul']),
            'store_product_id.integer' => __('admin::general.validation.integer', ['attribute' => 'Məhsul']),
            'store_product_id.exists' => __('admin::general.validation.exists', ['attribute' => 'Məhsul']),
            'barcode.required' => __('admin::general.validation.required', ['attribute' => 'Barkod']),
            'barcode.string' => __('admin::general.validation.string', ['attribute' => 'Barkod']),
            'barcode.unique' => __('admin::general.validation.unique', ['attribute' => 'barkod']),
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
