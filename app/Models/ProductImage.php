<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        'is_primary',
        'sort_order'
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Scope ảnh chính
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    // Scope sắp xếp
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    // Accessor để lấy full URL ảnh
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
