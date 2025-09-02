<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('product.product-list', compact('products'));
    }
    public function viewProductList($id)
    {
        $product = Product::find($id);
        return view('product.view-product-list', compact('product'));
    }

    public function addProduct($id = 0)
    {
        $product = $id ? Product::find($id) : new Product();
        return view('product.form', compact('product','id'));
    }

    public function storeProduct(Request $request, $id = 0)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'SKU' => 'required|unique:products,sku,'.$id,
            'qty' => 'required|integer',
            'type' => 'required',
            'vendor' => 'required',
            'image' => $id == 0 ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($id == 0) {
            $product = new Product();
            $message = 'Product created successfully!';
        } else {
            $product = Product::findOrFail($id);
            $message = 'Product updated successfully!';
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sku = $request->SKU;
        $product->qty = $request->qty;
        $product->type = $request->type;
        $product->vendor = $request->vendor;

        if ($request->hasFile('image')) {
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/product'), $filename);

            if ($id != 0 && $product->image && file_exists(public_path('uploads/product/'.$product->image))) {
                unlink(public_path('uploads/product/'.$product->image));
            }

            $product->image = $filename;
        }

        $product->save();

        return redirect('/product-list')->with('success', $message);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && file_exists(public_path('uploads/product/'.$product->image))) {
            unlink(public_path('uploads/product/'.$product->image));
        }
        $product->delete();

        return response()->json(['success' => 200]);
    }
}
