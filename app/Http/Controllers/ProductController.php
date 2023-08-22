<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        
        return view('index', ['products' => $products]);
    }
    public function create(){

        return view('create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|max:30|unique:products,name',
            'selling_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'type' => 'required',
        ]);

        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product Added Successfully');
    }

    public function edit(Product $product ) {
        return view('edit', ['product' => $product]);
        
    }
    public function update(Product $product, Request $request ) {
        $data = $request->validate([
            'name' => 'required|max:30|unique:products,name',
            'selling_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'type' => 'required',
        ]);
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
        }
    
    public function destroy($id){

        $product = new Product();
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }

}
