<?php

use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductTagController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'admin'], function () {

    /*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

    Route::get('admin-dashboard', [DashboardController::class, 'adminDashboardView'])->name('admin.dashboard.view');


    /*
    |--------------------------------------------------------------------------
    | Role Routes
    |--------------------------------------------------------------------------
    */

    Route::get('admin-role', [RoleController::class, 'adminRoleView'])->name('admin.role.view');
    Route::get('all-roles', [RoleController::class, 'allAdminRoles']);
    Route::post('add-role', [RoleController::class, 'addRole']);
    Route::get('trash-restore-role/{id}', [RoleController::class, 'trashRestoreRole']);
    Route::get('delete-role/{id}', [RoleController::class, 'deleteRole']);
    Route::get('edit-role/{id}', [RoleController::class, 'editRole']);
    Route::post('update-role/{id}', [RoleController::class, 'updateRole']);
    Route::get('view-role/{id}', [RoleController::class, 'editRole']);
    Route::get('role-status/{id}', [RoleController::class, 'updateRoleStatus']);


    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */

    Route::get('admin-user', [UserController::class, 'adminUserView'])->name('admin.user.view');
    Route::post('admin-user-add', [UserController::class, 'adminUserAdd']);
    Route::get('user-status/{id}', [UserController::class, 'adminUserStatus']);
    Route::get('user-edit/{id}', [UserController::class, 'edituser']);
    Route::post('user-update/', [UserController::class, 'updateUser']);
    Route::get('trashed-users', [UserController::class, 'trashedUsersLoad'])->name('trashed.users.view');
    Route::get('staff-users', [UserController::class, 'boxViewUsersLoad'])->name('staff.users.view');
    Route::get('user-trash-restore/{id}', [UserController::class, 'trashRestoreUser']);
    Route::get('user-delete/{id}', [UserController::class, 'deleteUser']);
    Route::get('user-view/{id}', [UserController::class, 'singleUser']);
    Route::get('user-settings', [UserController::class, 'userSettings'])->name('staff-user-setting');


    /*
    |--------------------------------------------------------------------------
    | Brand Routes
    |--------------------------------------------------------------------------
    */
    Route::get('brand', [BrandController::class, 'brandPageLoad'])->name('brand.page.load');
    Route::post('brand', [BrandController::class, 'AddBrand']);
    Route::get('all-brands', [BrandController::class, 'allAdminBrands']);
    Route::get('brand-status/{id}', [BrandController::class, 'updateBrandStatus']);
    Route::get('brand-edit/{id}', [BrandController::class, 'editBrand']);
    Route::post('brand-update/{id}', [BrandController::class, 'updateBrand']);
    Route::get('brand-trash-restore/{id}', [BrandController::class, 'trashRestoreBrand']);
    Route::get('brand-delete/{id}', [BrandController::class, 'deleteBrand']);



    /*
    |--------------------------------------------------------------------------
    | Tag Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-tag', [ProductTagController::class, 'index'])->name('tag.index');
    Route::get('product-tag-all', [ProductTagController::class, 'allTags'])->name('tag.all');
    Route::post('product-tag-store', [ProductTagController::class, 'store'])->name('tag.store');
    Route::get('product-tag-delete/{id}', [ProductTagController::class, 'tagDelete'])->name('tag.delete');



    /*
    |--------------------------------------------------------------------------
    | Main Category Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-category', [ProductCategoryController::class, 'index'])->name('product-category.index');
    Route::get('main-category-all', [ProductCategoryController::class, 'mainCategoriesAll'])->name('main.category.all');
    Route::post('product-categoryMain-store', [ProductCategoryController::class, 'store'])->name('product-category.store');
    Route::get('product-categoryMain-statusUpdate/{id}', [ProductCategoryController::class, 'mainCatStatusUpdate'])->name('product.category.mainCatStatusUpdate');
    Route::get('product-categoryMain-edit/{id}', [ProductCategoryController::class, 'mainCategoryEdit'])->name('product.category.mainCategoryEdit');
    Route::post('product-categoryMain-update', [ProductCategoryController::class, 'mainCategoryUpdate'])->name('product-category.update');
    Route::get('product-categoryMain-trashRestore/{id}', [ProductCategoryController::class, 'mainCategorytrashRestore'])->name('product.category.mainCategoryTrashRestore');
    Route::get('product-categoryMain-delete/{id}', [ProductCategoryController::class, 'mainCategoryDelete'])->name('product.category.mainCategoryDelete');


    /*
    |--------------------------------------------------------------------------
    | Second Category Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-categorySecond-all', [ProductCategoryController::class, 'allSecondCategories'])->name('product-category.allSecond');
    Route::post('product-categorySecond-store', [ProductCategoryController::class, 'storeSecond'])->name('product-category.storeSecond');
    Route::get('product-categorySecond-statusUpdate/{id}', [ProductCategoryController::class, 'secondCatStatusUpdate']);
    Route::get('product-categorySecond-edit/{id}', [ProductCategoryController::class, 'secondCategoryEdit']);
    Route::post('product-categorySecond-update', [ProductCategoryController::class, 'secondCategoryUpdate']);
    Route::get('product-categorySecond-trashRestore/{id}', [ProductCategoryController::class, 'secondCategorytrashRestore'])->name('product.category.secondCategoryTrashRestore');
    Route::get('product-categorySecond-delete/{id}', [ProductCategoryController::class, 'secondCategoryDelete'])->name('product.category.secondCategoryDelete');


    /*
    |--------------------------------------------------------------------------
    | Third Category Routes
    |--------------------------------------------------------------------------
    */
    Route::get('product-categorysecond-select/{id}', [ProductCategoryController::class, 'secondCategorySelect']);
    Route::get('product-categoryThird-select/{id}', [ProductCategoryController::class, 'thirdCategorySelect']);
    Route::post('product-categoryThird-store', [ProductCategoryController::class, 'storeThirdCategory']);
    Route::get('product-categoryThird-all', [ProductCategoryController::class, 'allThirdCategories']);
    Route::get('product-categorythird-statusUpdate/{id}', [ProductCategoryController::class, 'thirdCatStatusUpdate']);
    Route::get('product-categoryThird-trashRestore/{id}', [ProductCategoryController::class, 'thirdCategorytrashRestore']);
    Route::get('product-categoryThird-delete/{id}', [ProductCategoryController::class, 'thirdCategoryDelete']);



    /*
    |--------------------------------------------------------------------------
    | Product Routes
    |--------------------------------------------------------------------------
    */
    Route::get('products', [ProductController::class, 'index'])->name('product.index');
    Route::get('all-products', [ProductController::class, 'allProducts']);
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('product-store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product-edit/{id}', [ProductController::class, 'productEditPage'])->name('product.edit.page');
    //Route::get('/product-edit/{id}', [ProductController::class, 'productEditImage']);
    Route::put('/product-update/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
});




/*
|--------------------------------------------------------------------------
| User authentication routes
|--------------------------------------------------------------------------
*/
Route::get('admin-login', [AdminLoginController::class, 'adminLoginPage'])->name('admin.login.view')->middleware('logedin.admin');
Route::get('admin', [AdminLoginController::class, 'adminLoginRedirect']);
Route::post('admin-login', [AdminLoginController::class, 'adminLoginSystem'])->name('admin.login.system');
Route::get('admin-logout', [AdminLoginController::class, 'adminLogout'])->name('admin.logout.system');





/*
|--------------------------------------------------------------------------
| frontend routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product', [HomeController::class, 'singleProduct'])->name('single.product');
Route::get('/shop', [HomeController::class, 'shopPage'])->name('shop.page');
Route::get('/category', [HomeController::class, 'categoryPage'])->name('category.page');














//