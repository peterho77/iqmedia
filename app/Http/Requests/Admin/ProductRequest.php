<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        //kiem tr admin role
        return Auth::check() && Auth::user()->role === 'admin';
    }

    public function rules(): array
    {
        $productId = $this->route('product') ? $this->route('product')->id : null;
        
        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $productId,
            'description' => 'nullable|string|max:10000',
            'short_description' => 'nullable|string|max:500',        
            // Thêm validation cho sale_price
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price', 
            //Thêm validation cho SKU và stock
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $productId,
            'stock_quantity' => 'nullable|integer|min:0',           
            //Validate status
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable|in:active,inactive,draft',
            'is_featured' => 'nullable|boolean',          
            // Image
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự',
            'price.required' => 'Giá sản phẩm là bắt buộc',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm phải lớn hơn 0',
            'sale_price.numeric' => 'Giá khuyến mãi phải là số',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'sku.unique' => 'Mã SKU này đã tồn tại',
            'stock_quantity.integer' => 'Số lượng tồn kho phải là số nguyên',
            'stock_quantity.min' => 'Số lượng tồn kho không được âm',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'status.in' => 'Trạng thái phải là: Hoạt động, Không hoạt động, hoặc Nháp',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, webp',
            'image.max' => 'Ảnh không được vượt quá 2MB',
        ];
    }
}