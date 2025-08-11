<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Hiển thị tất cả sản phẩm - URL: /collections/all
     */
    public function index(Request $request)
    {
        $query = Product::with(['category', 'primaryImage'])
            ->active()
            ->ordered();
        // Lọc theo category 
        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Tìm kiếm theo tên
        // if ($request->has('q') && $request->q) {
        //     $query->where('name', 'like', '%' . $request->q . '%');
        // }

        // // Lọc theo giá
        // if ($request->has('price_min') && $request->price_min) {
        //     $query->where('price', '>=', $request->price_min);
        // }

        // if ($request->has('price_max') && $request->price_max) {
        //     $query->where('price', '<=', $request->price_max);
        // }

        // Sắp xếp
        // $sortBy = $request->get('sort', 'created_at');
        // $sortOrder = $request->get('order', 'desc');

        // switch ($sortBy) {
        //     case 'price':
        //         $query->orderBy('price', $sortOrder);
        //         break;
        //     case 'name':
        //         $query->orderBy('name', $sortOrder);
        //         break;
        //     case 'featured':
        //         $query->orderBy('is_featured', 'desc')->orderBy('created_at', 'desc');
        //         break;
        //     default:
        //         $query->orderBy('created_at', $sortOrder);
        // }

        // Phân trang
        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

        // Lấy categories để hiển thị filter
        $categories = Category::active()->ordered()->get();

        // Lấy sản phẩm nổi bật
        $featuredProducts = Product::with(['category', 'primaryImage'])
            ->active()
            ->featured()
            ->limit(8)
            ->get();

        return view('products.index', compact('products', 'categories', 'featuredProducts'));
    }

    /**
     * Hiển thị chi tiết sản phẩm - URL: /{product-slug}
     */
    public function show($slug)
    {
        $product = Product::with(['category', 'images'])
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        $product->increment('views');

        // Lấy sản phẩm liên quan (cùng category)
        $relatedProducts = Product::with(['category', 'primaryImage'])
            ->active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(8)
            ->get();

        // Lấy sản phẩm cùng thương hiệu (tương tự)
        $similarProducts = Product::with(['category', 'primaryImage'])
            ->active()
            ->where('name', 'like', '%' . explode(' ', $product->name)[0] . '%')
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts', 'similarProducts'));
    }

    /**
     * Tìm kiếm sản phẩm - AJAX
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (!$query) {
            return response()->json([]);
        }
        $products = Product::with(['category', 'primaryImage'])
            ->active()
            ->where('name', 'like', '%' . $query . '%')
            ->limit(10)
            ->get();       
        return response()->json($products->map(function($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->formatted_price,
                'sale_price' => $product->formatted_sale_price,
                'image' => $product->primaryImage ? asset($product->primaryImage->image_path) : null,
                'category' => $product->category ? $product->category->name : null,
                'url' => route('products.show', $product->slug)
            ];
        }));
    }
    public function category($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        
        $products = Product::where('category_id', $category->id)
            ->where('status', 'active')
            ->with('category')
            ->latest()
            ->paginate(12);    
        return view('products.category', compact('products', 'category'));
    }

    /**lấy sản phẩm nổi bật
     */
    public function featured()
    {
        
        $products = Product::with(['category'])
            ->where('status', 'active')
            ->where('is_featured', true)
            ->limit(12)
            ->get();
        return response()->json($products);
    }
}
