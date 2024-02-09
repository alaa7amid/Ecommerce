<?php


use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'  ]//عند خروج المستخدم من التطبيق لا تتغير اللغة التي اختارها عند دخوله اول مرة
    ],function()
{

    Route::group([
        'middleware' => ['is_admin','auth'],
        'prefix' =>'admin'
    ],function()
    {
        #---dashboard route------
        Route::get('/dashboard', [adminController::class ,'index'])->name('dashboard');

        Route::get('/admins',[adminController::class,'admins'])->name('admins');
        Route::get('/admins/create',[adminController::class,'adminsCreate'])->name('admins.creat');
        Route::post('/admins/store',[adminController::class,'adminsStore'])->name('admins.store');
        Route::get('/admins/{id}',[adminController::class,'adminShow'])->name('admins.show');
        Route::get('/admins/{id}/edit',[adminController::class,'adminEdit'])->name('admins.edit');
        Route::put('/admins/{id}/update',[adminController::class,'adminsUpdate'])->name('admins.update');
        Route::delete('/admins/{id}/delete',[adminController::class,'adminDelete'])->name('admins.delete');






        ##--categories routes ---
        Route::resource('/categories', \App\Http\Controllers\Admin\categoryController::class);

        ##--prodects routses ---

        Route::resource('/prodects', \App\Http\Controllers\Admin\prodectController::class);


    });

    #----website routes-----
    Route::get('/',[WebsiteController::class,'index']);

    Route::get('/categories',[WebsiteController::class,'getCategories'])->name('getCategories');

    Route::get('/category/{slug}',[WebsiteController::class,'getcategoryBySlug'])->name('getcategoryBySlug');

    Route::get('/category/{cataegory_slug}/{prodect_slug}',[WebsiteController::class,'getProdectBySlug'])->name('getProdectBySlug');

    Route::get('/prodects',[WebsiteController::class,'getProdects'])->name('getProdects');

    Route::post('/prodect/addToCart',[CartController::class,'addToCart'])->name('prodect.AddToCart');
    });


	//Route::get('/', function () {
      //  return view('website.index');
    //
     //});




