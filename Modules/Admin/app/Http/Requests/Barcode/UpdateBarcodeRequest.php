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
            'store_product_id' => ['required', 'integer', Rule::exists('store_products', 'id')->whereNull('deleted_at')],
            'barcode' => ['required', 'string', Rule::unique('store_product_barcodes', 'barcode')->ignore($this->barcode, 'id')->whereNull('deleted_at')],
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
