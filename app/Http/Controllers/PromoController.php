<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    public function index()
    {
       $promos = Promo::all(); 
       return view('admin.promo.index', compact('promos'));
    }
    public function create()
    {
      return view('admin.promo.create');
    }
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'status' => 'required|boolean',
    ]);

      $promos = new Promo();
      $promos->title = $request->input('title');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/promo'), $imageName);
        $promos->image = $imageName;
      }

      $promos->status = $request->status == true ? '0':'1';
      $promos->save();

      return redirect()->route('semua.promo')->with('message', 'Promo Berhasil Dibuat');
    }

    public function edit($id)
    {
      $promos = Promo::findOrFail($id);
      return view('admin.promo.edit',compact('promos'));
    }
    public function update(Request $request, Promo $promos, $id)
    {
      $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'status' => 'required|boolean',
      ]);

        $promos = Promo::findOrFail($id);
        $promos->title = $request->input('title');


        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('images/promo'), $imageName);
          $promos->image = $imageName;
        }

        $promos->status = $request->status == true ? '0' : '1';
        $promos->update();

        return redirect()->route('semua.promo')->with('message', 'Promo Berhasil Diperbarui');
    }

    public function destroy(string $id)
    {
        $promos = Promo::findOrFail($id);
        $promos->delete();

        return redirect()->route('semua.promo')->with('message', 'Promo Berhasil Dihapus');
    }
      
}
