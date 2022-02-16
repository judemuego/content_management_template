<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.inventory.maintenance.products', compact('products'));
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Product::get())
            ->addIndexColumn()
            ->make(true);
        }
    }
   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $product = $request->validate([
            'product_name' => ['required'],
            'color' => ['required'],
            'class_name' => ['required'],
            'unit_price' => ['required'],

        ]);

        Product::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $products = Product::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('products'));
    }

    public function update(Request $request, $id)
    {
        Product::find($id)->update($request->all());
        return "Record Saved";
    }

    public function destroy($id)
    {
        $product_destroy = Product::find($id);
        $product_destroy->delete();
        return "Successfully Deleted!";
    }
}
