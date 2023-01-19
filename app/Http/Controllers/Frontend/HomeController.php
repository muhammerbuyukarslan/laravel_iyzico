<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index($categorySlug= ""):View
    {

        if (Str::of($categorySlug)->isNotEmpty())
        {
            $selectedCategory = Category::all()->where("is_active", true)->where("slug",$categorySlug)->first();
            $products = $selectedCategory ->products;
        }
        else
        {
            $products = Product::all()->where("is_active", true);
        }

        $categories = Category::all()->where("is_active", true);
        return view("frontend.home.index",["categories"=>$categories ,"products"=>$products]);
    }
}
