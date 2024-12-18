<?php

namespace Modules\Admin\Http\Requests\StoreProduct;

use App\Enums\StatusEnum;
use App\Enums\TaxTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateStoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'array'],
            'name.*' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:255'],
            'description' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'array'],
            'description.*' => ['nullable', 'string', 'sometimes', 'not_regex:/^\s*$/', 'max:500'],
            'category_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'order_count' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'integer', 'min:0'],
            'tax' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0'],
            'tax_type' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(TaxTypeEnum::class)],
            'tax_percent' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0'],
            'unit_id' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', Rule::exists('units', 'id')->whereNull('deleted_at')],
            'rating' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'numeric', 'min:0', 'max:5'],
            'is_recommended' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
            'is_organic' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
            'is_halal' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
            'is_vegan' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
            'is_popular_item' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', 'boolean'],
            'status' => ['nullable', 'sometimes', 'not_regex:/^\s*$/', new Enum(StatusEnum::class)]
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
