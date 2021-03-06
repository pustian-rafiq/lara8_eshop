<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Category\AddCategoryComponent;
use App\Http\Livewire\Admin\Category\EditCategoryComponent;
use App\Http\Livewire\Admin\Product\ProductComponent;
use App\Http\Livewire\Admin\Product\AddProductComponent;
use App\Http\Livewire\Admin\Product\EditProductComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Rezoan Hasan,Mustakim Hasan Jarif/Rafid, Mustakim Hasan Mahir, Farhan Hossain Faiaz/Fahim, MD Akif Hossain. Md labib Hasan. Md. Afif Hossasin Abid/ Arham/ Fuad/ Labib/ Adil/ 
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class);
Route::get('/product/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('user/dashboard',UserDashboardComponent::class,)->name('user.dashboard');
});

// For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('admin/dashboard',AdminDashboardComponent::class,)->name('admin.dashboard');

    //Admin category routes here
    Route::get('admin/categories',AdminCategoryComponent::class,)->name('admin.categories');
    Route::get('admin/add/category',AddCategoryComponent::class,)->name('admin.addCategory');
    Route::get('admin/edit/category/{category_slug}',EditCategoryComponent::class)->name('admin.editCategory');

    //Admin product routes here
    Route::get('admin/products',ProductComponent::class)->name('admin.products');
    Route::get('admin/add/product',AddProductComponent::class)->name('admin.addProduct');
    Route::get('admin/edit/product/{product_slug}',EditProductComponent::class)->name('admin.editProduct');
});
