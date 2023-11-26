<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promo;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::all();

        $products = Product::where('status', 'Aktif')->get();

        $promos = Promo::where('status','0')->get();

        return view('product', compact('products','promos'));


    }

}
