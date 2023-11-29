<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promo;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::all();

        $query = Product::where('status', 'Aktif');

        // Check if there is a search query
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $products = $query->get();

        $promos = Promo::where('status', '0')->get();

        return view('product', compact('products', 'promos'));
    }
    
}
