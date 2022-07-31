<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ProductCategoryGrandMother;
use App\Models\Backend\productCategorySecond;
use App\Models\Backend\ProductCategoryThird;

class ProductCategoryController extends Controller
{

    /*
|--------------------------------------------------------------------------
| 1. product category index
|--------------------------------------------------------------------------
*/
    public function index()
    {

        $data = ProductCategoryGrandMother::where('trash', false)->where('status', true)->get();
        return view('backend.pages.product.category.index', [
            'data' => $data
        ]);
    }



    /*
|--------------------------------------------------------------------------
| 2. main category store
|--------------------------------------------------------------------------
*/
    public function store(Request $request)
    {

        $name_check = ProductCategoryGrandMother::where('name', $request->name)->first();

        if (!empty($name_check)) {
            return [
                'name_check' => 'exist'
            ];
        }

        $icon_name = '';
        if ($request->hasFile('photo_icon')) {
            $photo_icon = $request->file('photo_icon');
            $icon_name = md5(rand()) . '.' . $photo_icon->getClientOriginalExtension();
            $extention = $photo_icon->getClientOriginalExtension();
            if ($extention == 'png' || $extention == 'svg' || $extention == 'jpg' || $extention == 'webp' || $extention == 'jpeg') {
                $photo_icon->move(storage_path('app/public/categories/icon'), $icon_name);
            }
        } else {
            $icon_name = $request->font_icon;
        }

        $ptoto_name = '';
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $ptoto_name = md5(rand()) . '.' . $photo->getClientOriginalExtension();
            $extention = $photo->getClientOriginalExtension();
            if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' || $extention == 'webp') {
                $photo->move(storage_path('app/public/categories/images'), $ptoto_name);
            }
        } else {
            $ptoto_name = '';
        }


        if (empty($name_check)) {
            ProductCategoryGrandMother::create([
                'name'          => $request->name,
                'slug'          => Str::slug($request->name),
                'icon'          => $icon_name,
                'photo'          => $ptoto_name,
            ]);
        }
    }



    /*
|--------------------------------------------------------------------------
| 3. main category all
|--------------------------------------------------------------------------
*/
    public function mainCategoriesAll()
    {

        if (request()->ajax()) {

            return datatables()->of(ProductCategoryGrandMother::all())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })


                ->addColumn('icon', function ($data) {

                    $icon_lenth = Str::length($data->icon);
                    $image_path = url('storage/categories/icon') . '/' . $data->icon;

                    if ($icon_lenth < 20) {
                        return '<i class="' . $data->icon . '"></i>';
                    } else {
                        return '<img style="width:15px;" src="' . $image_path . '">';
                    }
                })

                ->addColumn('photo', function ($data) {

                    $image_path = url('storage/categories/images') . '/' . $data->photo;

                    return '<img style="width:35px;" src="' . $image_path . '">';
                })

                ->addColumn('status', function ($data) {

                    //status btn checked unchecked
                    $status_check = $data->status ? 'checked' : '';


                    if ($data->trash == 0) {
                        $button = '<label class="switch">
                            <input value="' . $data->id . '" id="grand_cat_status_btn" type="checkbox" ' . $status_check . '>
                            <span class="slider round"></span>
                    </label>';
                        return $button;
                    } else {
                        return '<p class="badge bg-danger" style="font-size: 12px;">Trashed</p>';
                    }
                })

                ->addColumn('action', function ($data) {

                    //Action btn show by conditions

                    if ($data->trash == 1) {

                        $button = '';

                        $button .= '<a href="#" grand_cat_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm grand_cat_trash_btn"><i class="fa fa-undo"></i></a> ';
                        $button .= '<a href="#" grand_cat_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm grand_cat_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                        return $button;
                    } else {
                        $button = '';
                        $button .= '<a href="#" grand_cat_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm grand_cat_edit_btn"><i class="fa fa-edit"></i></a> ';

                        $button .= '<a href="#" grand_cat_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm grand_cat_trash_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                })

                ->rawColumns(['sl', 'icon', 'photo', 'status', 'action'])->make();
        }
    }

    /*
|--------------------------------------------------------------------------
| 4. main category status change system
|--------------------------------------------------------------------------
*/
    public function mainCatStatusUpdate($id)
    {

        $data = ProductCategoryGrandMother::find($id);

        if ($data->status == true) {
            $data->status = false;
            $data->update();
        } else {
            $data->status = true;
            $data->update();
        }
    }

    /*
|--------------------------------------------------------------------------
| 5. main category edit
|--------------------------------------------------------------------------
*/
    public function mainCategoryEdit($id)
    {

        $data = ProductCategoryGrandMother::find($id);

        $icon_path = url('storage/categories/icon/') . '/' . $data->icon;
        $photo_path = url('storage/categories/images/') . '/' . $data->photo;


        return [
            'data' => $data,
            'icon_path' => $icon_path,
            'photo_path' => $photo_path,

        ];
    }


    /*
|--------------------------------------------------------------------------
| 6. Update main category
|--------------------------------------------------------------------------
*/
    public function mainCategoryUpdate(Request $request)
    {

        $data = ProductCategoryGrandMother::find($request->id);
        if ($data->name != $request->name) {
            $exist_name        =  ProductCategoryGrandMother::where('name', $request->name)->first();
        } else {
            $exist_name = '';
        }

        // photo update
        $image_path = storage_path('app/public/categories/images/') . $data->photo;

        $file_name = '';
        if ($request->hasFile('new_photo')) {
            $file = $request->file('new_photo');
            $file_name = md5(rand()) . '.' . $file->getClientOriginalExtension();

            $extention = $file->getClientOriginalExtension();

            if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' || $extention == 'webp') {
                $file->move(storage_path('app/public/categories/images/'), $file_name);
            }
            if (file_exists($image_path) && empty($exist_name)) {
                unlink($image_path);
            }
        } else {
            $file_name = $request->old_photo;
        }




        // icon update
        $icon_path = storage_path('app/public/categories/icon/') . $data->icon;

        $icon_name = '';
        if ($request->hasFile('photo_icon')) {
            $photo_icon = $request->file('photo_icon');
            $icon_name = md5(rand()) . '.' . $photo_icon->getClientOriginalExtension();
            $extention = $photo_icon->getClientOriginalExtension();
            if ($extention == 'png' || $extention == 'svg' || $extention == 'jpg' || $extention == 'webp' || $extention == 'jpeg') {
                $photo_icon->move(storage_path('app/public/categories/icon'), $icon_name);
            }
            if (file_exists($icon_path) && empty($exist_name)) {
                unlink($icon_path);
            }
        } else if ($request->font_icon != '') {
            $icon_name = $request->font_icon;
            if (file_exists($icon_path) && empty($exist_name)) {
                unlink($icon_path);
            }
        } else {
            $icon_name = $request->old_icon;
        }

        if (!empty($exist_name)) {
            return [
                'f' => 'Hi'
            ];
        } else {
            $data->name                     =      $request->name;
            $data->slug                     =      Str::slug($request->name);
            $data->icon                     =      $icon_name;
            $data->photo                    =      $file_name;

            $data->update();
        }
    }

    /*
|--------------------------------------------------------------------------
| 7. trash-restore main category
|--------------------------------------------------------------------------
*/
    public function mainCategorytrashRestore($id)
    {

        $data = ProductCategoryGrandMother::find($id);
        if ($data->trash == true) {
            $data->trash = false;
            $data->update();
            return [
                'key' => 'back'
            ];
        } else {
            $data->trash = true;
            $data->update();
            return [
                'key' => 'move'
            ];
        }
    }

    /*
|--------------------------------------------------------------------------
| 8. delete main category
|--------------------------------------------------------------------------
*/
    public function mainCategoryDelete($id)
    {

        $data = ProductCategoryGrandMother::find($id);
        $data->delete();

        $image_path = storage_path('app/public/categories/images/') . $data->photo;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $icon_path = storage_path('app/public/categories/icon/') . $data->icon;
        if (file_exists($icon_path)) {
            unlink($icon_path);
        }
    }

    /*
|--------------------------------------------------------------------------
| 9. store second category
|--------------------------------------------------------------------------
*/
    public function storeSecond(Request $request)
    {

        $name_check = productCategorySecond::where('name', $request->name)->first();

        if (!empty($name_check)) {
            return [
                'name_check' => 'exist'
            ];
        }

        $icon_name = '';
        if ($request->hasFile('photo_icon')) {
            $photo_icon = $request->file('photo_icon');
            $icon_name = md5(rand()) . '.' . $photo_icon->getClientOriginalExtension();
            $extention = $photo_icon->getClientOriginalExtension();
            if ($extention == 'png' || $extention == 'svg' || $extention == 'jpg' || $extention == 'webp' || $extention == 'jpeg') {
                $photo_icon->move(storage_path('app/public/categories/icon'), $icon_name);
            }
        } else {
            $icon_name = $request->font_icon;
        }

        $photo_name = '';
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = md5(rand()) . '.' . $photo->getClientOriginalExtension();
            $extention = $photo->getClientOriginalExtension();
            if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' || $extention == 'webp') {
                $photo->move(storage_path('app/public/categories/images'), $photo_name);
            }
        } else {
            $photo_name = '';
        }


        if (empty($name_check)) {
            productCategorySecond::create([
                'main_cat_id'           => $request->main_cat_id,
                'name'                  => $request->name,
                'slug'                  => Str::slug($request->name),
                'icon'                  => $icon_name,
                'photo'                 => $photo_name,
            ]);
        }
    }


    /*
|--------------------------------------------------------------------------
| 10. second category all
|--------------------------------------------------------------------------
*/
    public function allSecondCategories()
    {

        if (request()->ajax()) {

            return datatables()->of(productCategorySecond::all())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })

                ->addColumn('mainCat', function ($data) {

                    return $data->mainCategory->name;
                })

                ->addColumn('icon', function ($data) {

                    $icon_lenth = Str::length($data->icon);
                    $image_path = url('storage/categories/icon') . '/' . $data->icon;

                    if ($icon_lenth < 20) {
                        return '<i class="' . $data->icon . '"></i>';
                    } else {
                        return '<img style="width:15px;" src="' . $image_path . '">';
                    }
                })

                ->addColumn('photo', function ($data) {

                    $image_path = url('storage/categories/images') . '/' . $data->photo;

                    return '<img style="width:35px;" src="' . $image_path . '">';
                })

                ->addColumn('status', function ($data) {

                    //status btn checked unchecked
                    $status_check = $data->status ? 'checked' : '';


                    if ($data->trash == 0) {
                        $button = '<label class="switch">
                            <input value="' . $data->id . '" id="second_cat_status_btn" type="checkbox" ' . $status_check . '>
                            <span class="slider round"></span>
                    </label>';
                        return $button;
                    } else {
                        return '<p class="badge bg-danger" style="font-size: 12px;">Trashed</p>';
                    }
                })

                ->addColumn('action', function ($data) {

                    //Action btn show by conditions

                    if ($data->trash == 1) {

                        $button = '';

                        $button .= '<a href="#" second_cat_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm second_cat_trash_btn"><i class="fa fa-undo"></i></a> ';
                        $button .= '<a href="#" second_cat_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm second_cat_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                        return $button;
                    } else {
                        $button = '';
                        $button .= '<a href="#" second_cat_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm second_cat_edit_btn"><i class="fa fa-edit"></i></a> ';

                        $button .= '<a href="#" second_cat_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm second_cat_trash_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                })

                ->rawColumns(['sl', 'mainCat', 'icon', 'photo', 'status', 'action'])

                ->make();
        }
    }


    /*
|--------------------------------------------------------------------------
| 11. second category status change system
|--------------------------------------------------------------------------
*/
    public function secondCatStatusUpdate($id)
    {

        $data = productCategorySecond::find($id);

        if ($data->status == true) {
            $data->status = false;
            $data->update();
        } else {
            $data->status = true;
            $data->update();
        }
    }

    /*
|--------------------------------------------------------------------------
| 12. second category edit
|--------------------------------------------------------------------------
*/
    public function secondCategoryEdit($id)
    {

        $data = productCategorySecond::find($id);
        $main_data = ProductCategoryGrandMother::all();

        $icon_path = url('storage/categories/icon/') . '/' . $data->icon;
        $photo_path = url('storage/categories/images/') . '/' . $data->photo;

        // main category show
        $main_cat_list = '';
        $main_cat_list .= '<select name="main_cat_id" class="form-control">';
        $main_cat_list .= '<option value="" disabled>-Select-</option>';
        foreach ($main_data as $cat) {
            $selected = '';
            if ($data->main_cat_id == $cat->id) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $main_cat_list .= '<option value="' . $cat->id . '" ' . $selected . '>' . $cat->name . '</option>';
        }
        $main_cat_list .= '</select>';


        return [
            'data' => $data,
            'icon_path' => $icon_path,
            'photo_path' => $photo_path,
            'main_cat_list' => $main_cat_list

        ];
    }


    /*
|--------------------------------------------------------------------------
| 13. Update second category
|--------------------------------------------------------------------------
*/
    public function secondCategoryUpdate(Request $request)
    {

        $data = productCategorySecond::find($request->id);
        if ($data->name != $request->name) {
            $exist_name        =  productCategorySecond::where('name', $request->name)->first();
        } else {
            $exist_name = '';
        }

        // photo update
        $image_path = storage_path('app/public/categories/images/') . $data->photo;

        $file_name = '';
        if ($request->hasFile('new_photo')) {
            $file = $request->file('new_photo');
            $file_name = md5(rand()) . '.' . $file->getClientOriginalExtension();

            $extention = $file->getClientOriginalExtension();

            if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' || $extention == 'webp') {
                $file->move(storage_path('app/public/categories/images/'), $file_name);
            }
            if (file_exists($image_path) && empty($exist_name)) {
                unlink($image_path);
            }
        } else {
            $file_name = $request->old_photo;
        }




        // icon update
        $icon_path = storage_path('app/public/categories/icon/') . $data->icon;

        $icon_name = '';
        if ($request->hasFile('photo_icon')) {
            $photo_icon = $request->file('photo_icon');
            $icon_name = md5(rand()) . '.' . $photo_icon->getClientOriginalExtension();
            $extention = $photo_icon->getClientOriginalExtension();
            if ($extention == 'png' || $extention == 'svg' || $extention == 'jpg' || $extention == 'webp' || $extention == 'jpeg') {
                $photo_icon->move(storage_path('app/public/categories/icon'), $icon_name);
            }
            if (file_exists($icon_path) && empty($exist_name)) {
                unlink($icon_path);
            }
        } else if ($request->font_icon != '') {
            $icon_name = $request->font_icon;
            if (file_exists($icon_path) && empty($exist_name)) {
                unlink($icon_path);
            }
        } else {
            $icon_name = $request->old_icon;
        }

        if (!empty($exist_name)) {
            return [
                'f' => 'Hi'
            ];
        } else {
            $data->name                     =      $request->name;
            $data->main_cat_id              =      $request->main_cat_id;
            $data->slug                     =      Str::slug($request->name);
            $data->icon                     =      $icon_name;
            $data->photo                    =      $file_name;

            $data->update();
        }
    }


    /*
|--------------------------------------------------------------------------
| 14. trash-restore second category
|--------------------------------------------------------------------------
*/
    public function secondCategorytrashRestore($id)
    {

        $data = productCategorySecond::find($id);
        if ($data->trash == true) {
            $data->trash = false;
            $data->update();
            return [
                'key' => 'back'
            ];
        } else {
            $data->trash = true;
            $data->update();
            return [
                'key' => 'move'
            ];
        }
    }


    /*
|--------------------------------------------------------------------------
| 15. delete second category
|--------------------------------------------------------------------------
*/
    public function secondCategoryDelete($id)
    {

        $data = productCategorySecond::find($id);
        $data->delete();

        $image_path = storage_path('app/public/categories/images/') . $data->photo;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $icon_path = storage_path('app/public/categories/icon/') . $data->icon;
        if (file_exists($icon_path)) {
            unlink($icon_path);
        }
    }


    /*
|--------------------------------------------------------------------------
| 16. select second caegory in form
|--------------------------------------------------------------------------
*/
    public function secondCategorySelect($id)
    {

        $data = ProductCategoryGrandMother::find($id);


        $second_cat_list = '';
        $second_cat_list .= '<option value="">-Select a 2nd category-</option>';
        foreach ($data->secondCategory as $cat) {
            $second_cat_list .= '<option value="' . $cat->id . '">' . $cat->name . '</option>';
        }
        return $second_cat_list;
        
    }


    /*
|--------------------------------------------------------------------------
| 16. select third caegory in form
|--------------------------------------------------------------------------
*/
    public function thirdCategorySelect($id)
    {

        $data = productCategorySecond::find($id);


        $third_cat_list = '';
        $third_cat_list .= '<option value="">-Select a 3rd category-</option>';
        foreach ($data->thirdCategory as $cat) {
            $third_cat_list .= '<option value="' . $cat->id . '">' . $cat->name . '</option>';
        }
        return $third_cat_list;
    }


    /*
|--------------------------------------------------------------------------
| 17. store third category
|--------------------------------------------------------------------------
*/
    public function storeThirdCategory(Request $request)
    {

        $name_check = ProductCategoryThird::where('name', $request->name)->first();

        if (!empty($name_check)) {
            return [
                'name_check' => 'exist'
            ];
        }

        $icon_name = '';
        if ($request->hasFile('photo_icon')) {
            $photo_icon = $request->file('photo_icon');
            $icon_name = md5(rand()) . '.' . $photo_icon->getClientOriginalExtension();
            $extention = $photo_icon->getClientOriginalExtension();
            if ($extention == 'png' || $extention == 'svg' || $extention == 'jpg' || $extention == 'webp' || $extention == 'jpeg') {
                $photo_icon->move(storage_path('app/public/categories/icon'), $icon_name);
            }
        } else {
            $icon_name = $request->font_icon;
        }

        $photo_name = '';
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = md5(rand()) . '.' . $photo->getClientOriginalExtension();
            $extention = $photo->getClientOriginalExtension();
            if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' || $extention == 'webp') {
                $photo->move(storage_path('app/public/categories/images'), $photo_name);
            }
        } else {
            $photo_name = '';
        }


        if (empty($name_check)) {
            ProductCategoryThird::create([
                'main_cat_id'           => $request->main_cat_id,
                'second_cat_id'         => $request->second_cat_id,
                'name'                  => $request->name,
                'slug'                  => Str::slug($request->name),
                'icon'                  => $icon_name,
                'photo'                 => $photo_name,
            ]);
        }
    }

    /*
|--------------------------------------------------------------------------
| 18. third category all
|--------------------------------------------------------------------------
*/
    public function allThirdCategories()
    {

        if (request()->ajax()) {

            return datatables()->of(ProductCategoryThird::all())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })

                ->addColumn('secondCat', function ($data) {

                    return $data->secondCategory->name;
                })

                ->addColumn('mainCat', function ($data) {

                    return $data->mainCategory->name;
                })

                ->addColumn('icon', function ($data) {

                    $icon_lenth = Str::length($data->icon);
                    $image_path = url('storage/categories/icon') . '/' . $data->icon;

                    if ($icon_lenth < 20) {
                        return '<i class="' . $data->icon . '"></i>';
                    } else {
                        return '<img style="width:15px;" src="' . $image_path . '">';
                    }
                })

                ->addColumn('photo', function ($data) {

                    $image_path = url('storage/categories/images') . '/' . $data->photo;

                    return '<img style="width:35px;" src="' . $image_path . '">';
                })

                ->addColumn('status', function ($data) {

                    //status btn checked unchecked
                    $status_check = $data->status ? 'checked' : '';


                    if ($data->trash == 0) {
                        $button = '<label class="switch">
                            <input value="' . $data->id . '" id="third_cat_status_btn" type="checkbox" ' . $status_check . '>
                            <span class="slider round"></span>
                    </label>';
                        return $button;
                    } else {
                        return '<p class="badge bg-danger" style="font-size: 12px;">Trashed</p>';
                    }
                })

                ->addColumn('action', function ($data) {

                    //Action btn show by conditions

                    if ($data->trash == 1) {

                        $button = '';

                        $button .= '<a href="#" third_cat_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm third_cat_trash_btn"><i class="fa fa-undo"></i></a> ';
                        $button .= '<a href="#" third_cat_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm third_cat_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                        return $button;
                    } else {
                        $button = '';
                        $button .= '<a href="#" third_cat_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm third_cat_edit_btn"><i class="fa fa-edit"></i></a> ';

                        $button .= '<a href="#" third_cat_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm third_cat_trash_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                })

                ->rawColumns(['sl', 'secondCat', 'mainCat', 'icon', 'photo', 'status', 'action'])

                ->make();
        }
    }


    /*
|--------------------------------------------------------------------------
| 19. third category status change system
|--------------------------------------------------------------------------
*/
    public function thirdCatStatusUpdate($id)
    {

        $data = ProductCategoryThird::find($id);

        if ($data->status == true) {
            $data->status = false;
            $data->update();
        } else {
            $data->status = true;
            $data->update();
        }
    }

    /*
|--------------------------------------------------------------------------
| 20. trash-restore second category
|--------------------------------------------------------------------------
*/
    public function thirdCategorytrashRestore($id)
    {

        $data = ProductCategoryThird::find($id);
        if ($data->trash == true) {
            $data->trash = false;
            $data->update();
            return [
                'key' => 'back'
            ];
        } else {
            $data->trash = true;
            $data->update();
            return [
                'key' => 'move'
            ];
        }
    }


    /*
|--------------------------------------------------------------------------
| 21. delete third category
|--------------------------------------------------------------------------
*/
    public function thirdCategoryDelete($id)
    {

        $data = ProductCategoryThird::find($id);
        $data->delete();

        $image_path = storage_path('app/public/categories/images/') . $data->photo;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $icon_path = storage_path('app/public/categories/icon/') . $data->icon;
        if (file_exists($icon_path)) {
            unlink($icon_path);
        }
    }
}
