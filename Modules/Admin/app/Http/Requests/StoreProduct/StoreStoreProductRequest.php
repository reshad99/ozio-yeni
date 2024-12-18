<?php

namespace Modules\Admin\Http\Requests\StoreProduct;

use App\Enums\StatusEnum;
use App\Enums\TaxTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreStoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string,mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.*' => ['required', 'string', 'max:255'],
            'description' => ['required', 'array'],
            'description.*' => ['required', 'string', 'max:500'],
            'category_id' => ['required', Rule::exists('categories', 'id')->whereNull('deleted_at')],
            'order_count' => ['required', 'integer', 'min:0'],
            'tax' => ['required', 'numeric', 'min:0'],
            'tax_type' => ['sometimes', new Enum(TaxTypeEnum::class)],
            'tax_percent' => ['required', 'numeric', 'min:0'],
            'unit_id' => ['required', Rule::exists('units', 'id')->whereNull('deleted_at')],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'is_recommended' => ['required', 'boolean'],
            'is_organic' => ['required', 'boolean'],
            'is_halal' => ['required', 'boolean'],
            'is_vegan' => ['required', 'boolean'],
            'is_popular_item' => ['required', 'boolean'],
            'status' => ['sometimes', new Enum(StatusEnum::class)]
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
