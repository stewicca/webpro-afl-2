<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $min_price = $request->get('min_price');
        $max_price = $request->get('max_price');
        $sort_by = $request->get('sort_by', 'name');
        $sort_order = $request->get('sort_order', 'asc');

        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%");
        })
        ->when($min_price, function ($query, $min_price) {
            return $query->where('price', '>=', $min_price);
        })
        ->when($max_price, function ($query, $max_price) {
            return $query->where('price', '<=', $max_price);
        })
        ->orderBy($sort_by, $sort_order)
        ->paginate(9);

        return view('products.index', compact('products', 'search', 'min_price', 'max_price', 'sort_by', 'sort_order'));
    }
}
