<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/products";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view("backend.products.index",["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view("backend.products.insert_form",["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $data =$this->prepare($request,$product->getFillable());
        $product ->fill($data);
        $product->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("backend.products.update_form", ["product"=>$product ,"categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data =$this->prepare($request,$product->getFillable());
        $product ->fill($data);
        $product->is_active=array_key_exists("is_active",$data)? $data["is_active"] : 0;
        $product->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(["message"=>"Done" , "id"=>$product->product_id]);
    }
}
