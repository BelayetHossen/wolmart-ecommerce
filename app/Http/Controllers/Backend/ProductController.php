<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;

use App\Models\Backend\Product;

use App\Models\Backend\ProductTag;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Backend\ProductCategoryGrandMother;

class ProductController extends Controller
{

    /*
|--------------------------------------------------------------------------
| 1. product index
|--------------------------------------------------------------------------
*/
    public function index()
    {
        return view('backend.pages.product.product.index');
    }

    /*
|--------------------------------------------------------------------------
| 1. product add page load
|--------------------------------------------------------------------------
*/
    public function addProduct()
    {
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $brands = Brand::all();
        return view('backend.pages.product.product.add-product', [
            'tags' => $tags,
            'cats_1' => $cats_1,
            'brands' => $brands
        ]);
    }


    /*
|--------------------------------------------------------------------------
| 1. product store
|--------------------------------------------------------------------------
*/
    public function store(Request $request)
    {



        $name = '';
        $gallery = [];
        if ($request->hasFile('photos')) {
            $images = $request->file('photos');

            foreach ($images as $img) {
                $name = md5(rand()) . '.' . $img->getClientOriginalExtension();
                array_push($gallery, $name);
                $extention = $img->getClientOriginalExtension();

                $inter = Image::make($img->getRealPath());
                $inter->save(storage_path('app/public/products/') . $name);
            }
        }

        return $gallery;




        // $title_check = Product::where('title', $request->title)->first();

        // if (!empty($title_check)) {
        //     return [
        //         'title_check' => 'exist'
        //     ];
        // } else {
        //     Product::create([
        //         'title'                 =>      $request->title,
        //         'slug'                  =>      Str::slug($request->title),
        //         'cat_1'                 =>      $request->main_cat_id,
        //         'cat_2'                 =>      $request->second_cat_id,
        //         'cat_3'                 =>      $request->third_cat_id,
        //         'brand'                 =>      $request->product_brand,
        //         'short_desc'            =>      $request->short_desc,
        //         'long_desc'             =>      $request->long_desc,
        //         'price'                 =>      $request->price,
        //         'sell_price'            =>      $request->sell_price,
        //         'featured'              =>      $request->featured,
        //         'hot'                   =>      json_encode($request->hot),
        //         'image'                 =>      'jjjj',
        //     ]);
        // }
    }


    /*
|--------------------------------------------------------------------------
| 1. second category select
|--------------------------------------------------------------------------
*/
    public function secondCatSelect($id)
    {
    }











    //
}
