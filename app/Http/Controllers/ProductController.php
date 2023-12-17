<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get(['id','product_name', 'quantity', 'unit_price']);

        // return $subcategories;
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {


        Product::create([

        'product_name' => $request->product_name,
        'unit_price' => $request->unit_price,
        'quantity' => $request->quantity,
        ]);

        Session::flash('status', 'Product created successfully!');
        return back();




        // Other logic...

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $product = Product::find($id);

        return view('products.edit', compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->update([

            'product_name' => $request->product_name,
            'unit_price' => $request->unit_price,
            'quantity' => $request->quantity,

        ]);

        Session::flash('status', 'Product updated successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        Session::flash('status', 'Product deleted successfully!');
        return redirect()->route('products.index');
    }
}







