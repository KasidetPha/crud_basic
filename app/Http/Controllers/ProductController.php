<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Backtrace\Arguments\ReducedArgument\ReducedArgument;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view("Products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product;
        $route = "store";
        $method = "POST";

        return view("Products.create", compact("route","method", "product"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($user);
        $dataProducts = [
            "productName" => $request->productName,
            "price" => $request->price,
            "detail" => $request->detail,
            "qty" => 0,
            "user_id" => Auth::user()->id,
        ];

        Product::create($dataProducts);
        return redirect()->route("index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $route = "update";
        $method = "PUT";
        $product = Product::findOrFail($id);
        // dd($product);
        return view("Products.create", compact("product","method","route"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $productUpdate = [
            "productName" => $request->productName,
            "price" => $request->price,
            "detail" => $request->detail,
        ];
        $product->update($productUpdate);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // dd($product);
        $product->delete();
        return redirect()->route('index');
    }
}
