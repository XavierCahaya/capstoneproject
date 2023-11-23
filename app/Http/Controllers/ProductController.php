<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promo;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::with('category')->get();

        $promos = Promo::where('status','0')->get();

        return view('product', compact('products','promos'));


    }

}
