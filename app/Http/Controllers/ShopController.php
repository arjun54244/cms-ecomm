<?php

namespace App\Http\Controllers;

use App\Models\{Category, Product, Setting};
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::active()
            ->orderBy('sort_order')
            ->get();

        $products = Product::with('category')
            ->active()

            ->when(request('search'), function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . request('search') . '%')
                        ->orWhere('sku', 'like', '%' . request('search') . '%')
                        ->orWhere('short_description', 'like', '%' . request('search') . '%');
                });
            })

            ->when(request('category'), function ($query) {
                $query->where('category_id', request('category'));
            })

            ->when(request('min_price'), function ($query) {
                $query->where('price', '>=', request('min_price'));
            })

            ->when(request('max_price'), function ($query) {
                $query->where('price', '<=', request('max_price'));
            })

            ->when(request('sort') == 'price_low', function ($query) {
                $query->orderBy('price');
            })

            ->when(request('sort') == 'price_high', function ($query) {
                $query->orderByDesc('price');
            })

            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('shop.index', compact(
            'categories',
            'products'
        ));
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->active()
            ->firstOrFail();

        $categories = Category::active()->get();

        $products = Product::where('category_id', $category->id)
            ->active()

            ->when(request('search'), function ($query) {

                $query->where(function ($q) {

                    $q->where('name', 'LIKE', '%' . request('search') . '%')
                        ->orWhere('sku', 'LIKE', '%' . request('search') . '%');

                });

            })

            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('shop.category', compact(
            'category',
            'categories',
            'products'
        ));
    }

    /**
     * Product Details
     */
    public function show(string $slug)
    {
        $product = Product::with([
            'category',
            'images'
        ])
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->latest()
            ->take(8)
            ->get();

        return view('shop.show', compact(
            'product',
            'relatedProducts'
        ));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        if (!$keyword) {

            return response()->json([]);

        }

        $products = Product::active()

            ->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', "%{$keyword}%")

                    ->orWhere('sku', 'LIKE', "%{$keyword}%");

            })

            ->take(8)

            ->get([
                'id',
                'name',
                'slug',
                'featured_image',
                'price',
                'sale_price'
            ]);

        return response()->json($products);
    }
}
