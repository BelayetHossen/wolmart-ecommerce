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
use Illuminate\Contracts\View\View;

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

    // all products load
    public function allProducts()
    {
        if (request()->ajax()) {

            return datatables()->of(Product::all())

            ->addColumn('sl', function ($data) {

                //SL no genarate
                $count = 1;
                return $count = $count + 1;
            })


                ->addColumn('title', function ($data) {

                    return $data->title;

                    //$img_arr = json_decode($data->image);

                    // $er = array_key_first($img_arr);

                    // $image_path = url('storage/products') . '/' . $img_arr[0];

                    //return '<img style="width:35px;" src="' . $image_path . '">' . '  ' . $data->title;
                })

                ->addColumn('category', function ($data) {

                    return $data->mainCat->name;
                })

                ->addColumn('2nd_cat', function ($data) {

                    return $data->secondCat->name;
                })

                ->addColumn('3rd_cat', function ($data) {

                    return $data->thirdCat->name;
                })

                ->addColumn(
                    'status',
                    function ($data) {

                        //status btn checked unchecked
                        $status_check = $data->status ? 'checked' : '';


                        if ($data->trash == 0) {
                            $button = '<label class="switch">
                                <input value="' . $data->id . '" id="product_status_btn" type="checkbox" ' . $status_check . '>
                                <span class="slider round"></span>
                        </label>';
                            return $button;
                        } else {
                            return '<p class="badge bg-danger" style="font-size: 12px;">Trashed</p>';
                        }
                    }
                )

                ->addColumn(
                    'action',
                    function ($data) {

                        //Action btn show by conditions

                        $reeee = "http://localhost:8000/product-edit";


                        if (
                            $data->trash == 1
                        ) {

                            $button = '';

                            $button .= '<a href="#" product_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm product_trash_btn"><i class="fa fa-undo"></i></a> ';
                            $button .= '<a href="#" product_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm product_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                            return $button;
                        } else {
                            $button = '';

                            $button .= '<a href="#" product_view_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-warning btn-sm product_view_btn"><i class="fa fa-eye"></i></a> ';

                            $button .= '<a href="' . $reeee . '/' . $data->id . '" product_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm product_edit_btn"><i class="fa fa-edit"></i></a> ';

                            $button .= '<a href="#" product_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm product_trash_btn"><i class="fa fa-trash"></i></a>';
                            return $button;
                        }
                    }
                )

                ->rawColumns(['sl', 'title', 'category', '2nd_cat', '3rd_cat', 'status', 'action'])->make();
        }
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
                $inter->save(storage_path('app/public/products/ ') . $name);
            }
        }


        $title_check = Product::where('title', $request->title)->first();

        if (!empty($title_check)) {
            return [
                'title_check' => 'exist'
            ];
        } else {
            Product::create([
                'title'                 =>      $request->title,
                'slug'                  =>      Str::slug($request->title),
                'cat_1'                 =>      $request->main_cat_id,
                'cat_2'                 =>      $request->second_cat_id,
                'cat_3'                 =>      $request->third_cat_id,
                'tags'                  =>      json_encode($request->tags),
                'brand'                 =>      $request->product_brand,
                'short_desc'            =>      $request->short_desc,
                'long_desc'             =>      $request->long_desc,
                'price'                 =>      $request->price,
                'sell_price'            =>      $request->sell_price,
                'featured'              =>      $request->featured,
                'hot'                   =>      json_encode($request->hot),
                'image'                 =>      json_encode($gallery),
            ]);
        }
    }


    /*
|--------------------------------------------------------------------------
| 1. second category select
|--------------------------------------------------------------------------
*/
    public function secondCatSelect($id)
    {
    }




    // product edit
    public function productEditPage($id)
    {
        $data = Product::find($id);
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $brands = Brand::all();
        $imgs = json_decode($data->image);
        $path = url('storage/products/');




        return view('backend.pages.product.product.edit-product', [
            'tags' => $tags,
            'cats_1' => $cats_1,
            'brands' => $brands,
            'data' => $data,
            'path' => $path,
            'images' => $imgs
        ]);
    }



    /*
|--------------------------------------------------------------------------
|  select second caegory in form
|--------------------------------------------------------------------------
*/
    public function secondCategorySelect($id)
    {

        $data = ProductCategoryGrandMother::find($id);
        return $data;


        // $second_cat_list = '';
        // $second_cat_list .= '<option value="">-Select a 2nd category-</option>';
        // foreach ($data->secondCategory as $cat) {
        //     $second_cat_list .= '<option value="' . $cat->id . '">' . $cat->name . '</option>';
        // }
        // return $second_cat_list;
    }


    /*
|--------------------------------------------------------------------------
|  Product update
|--------------------------------------------------------------------------
*/
    public function productUpdate(Request $request, $id)
    {


        $data = Product::find($id);

        $name = '';
        $gallery = [];
        if ($request->hasFile('galleryPhotos')) {
            $images = $request->file('galleryPhotos');

            foreach ($images as $img) {
                $name = md5(rand()) . '.' . $img->getClientOriginalExtension();
                array_push($gallery, $name);
                $extention = $img->getClientOriginalExtension();

                // $inter = Image::make($img->getRealPath());
                // $inter->save(storage_path('app/public/products/ ') . $name);
            }

            foreach (json_decode($data->image) as $delete_img) {
                $image_path = storage_path('app/public/products/') . $delete_img;
                //unlink($image_path);
                return $image_path;
            }
            //return $image_path;
        }



        // $data->title        = $request->title;
        // $data->slug         = Str::slug($request->title);
        // $data->cat_1        = $request->main_cat_id;
        // $data->cat_2        = $request->second_cat_id;
        // $data->cat_3        = $request->third_cat_id;
        // $data->tags         = json_encode($request->tags);
        // $data->brand        = $request->product_brand;
        // $data->short_desc   = $request->short_desc;
        // $data->long_desc    = $request->long_desc;
        // $data->price        = $request->price;
        // $data->sell_price   = $request->sell_price;
        // $data->featured     = $request->featured;
        // $data->hot          = json_encode($request->hot);
        // $data->image          = json_encode($gallery);

        // $data->update();

        // return redirect()->route('product.index');

        //return $request->galleryPhotos;
    }










    //
}
