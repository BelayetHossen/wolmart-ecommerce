<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCategoryGrandMother;

class HomeController extends Controller
{



    // home page load
    public function index()
    {
        $products = json_decode(Product::where('trash', false)->where('status', true)->take(12)->get());
        $main_cat = ProductCategoryGrandMother::all();
        $pro_img = url('storage/products/');
        return view('frontend.pages.home', [

            'main_cat' => $main_cat,
            'products' => $products,
            'pro_img' => $pro_img,

        ]);
    }

    // home page load
    public function singleProduct()
    {
        return view('frontend.pages.product');
    }

    // home page load
    public function shopPage()
    {
        return view('frontend.pages.shop');
    }

    // home page load
    public function categoryPage()
    {
        return view('frontend.pages.category');
    }
}
