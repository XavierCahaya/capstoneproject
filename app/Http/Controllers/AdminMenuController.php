<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminMenuController extends Controller
{

    public function semua()
    {
        $products = Product::all();
        $category = Category::all();
        return view('admin.product.semua.index', compact('products', 'category'));
    }

    public function makanan()
    {
        $category = Category::all();
        $selectedCategory = "Makanan";
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', $selectedCategory)
                            ->get();
        return view('admin.product.makanan.index', compact('category', 'products', 'selectedCategory'));
    }

    public function minuman()
    {
        $category = Category::all();
        $selectedCategory = "Minuman";
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', $selectedCategory)
                            ->get();
        return view('admin.product.minuman.index', compact('category', 'products', 'selectedCategory'));
    }

    public function snack()
    {
        $category = Category::all();
        $selectedCategory = "Snack";
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', $selectedCategory)
                            ->get();
        return view('admin.product.snack.index', compact('category', 'products', 'selectedCategory'));
    }

    // Admin Start

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:5000',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $products = new Product();
        $products->name = $request->input('name');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $imageName);
            $products->image = $imageName;
        }

        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');
        $products->save();

        return redirect()->back();
    }

    public function update(Request $request, Product $products, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:5000',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $products = Product::findOrFail($id);
        $products->name = $request->input('name');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $imageName);
            $products->image = $imageName;
        }

        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->category_id = $request->input('category_id');
        $products->update();

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        // dd('oke');
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect()->back();
    }

    // Admin End
}
