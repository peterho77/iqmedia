<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $productId = $this->route('product') ? $this->route('product')->id : null;
        
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $productId,
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $productId,
            'stock_quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive,draft',
            'is_featured' => 'boolean',
            'manage_stock' => 'boolean',
            'in_stock' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            
            // Upload multiple ảnh - lưu vào folder thuongmai
            'images' => 'nullable|array|max:10', // Tối đa 10 ảnh
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB mỗi ảnh
            'primary_image_index' => 'nullable|integer|min:0|max:9', // Index ảnh chính
        ];
    }

    /**
     * Get custom error messages
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc',
            'price.required' => 'Giá sản phẩm là bắt buộc',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'category_id.required' => 'Danh mục là bắt buộc',
            'category_id.exists' => 'Danh mục không tồn tại',
            
            'images.max' => 'Tối đa 10 ảnh cho mỗi sản phẩm',
            'images.*.image' => 'File phải là hình ảnh',
            'images.*.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, webp',
            'images.*.max' => 'Kích thước ảnh không được vượt quá 5MB',
            'primary_image_index.max' => 'Index ảnh chính không hợp lệ',
        ];
    }
}