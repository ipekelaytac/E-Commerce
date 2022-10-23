<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteProductsController;
use App\Http\Controllers\Management\ManagementUserController;
use App\Http\Controllers\Management\ManagementIndexController;
use App\Http\Controllers\Management\ManagementCategoryController;
use App\Http\Controllers\Management\ManagementProductController;
use App\Http\Controllers\Management\ManagementOrderController;
use Illuminate\Http\Redirect;

Route::group(['prefix' => 'yonetim', 'namespace' => 'Management'], function () {
    Route::redirect('/', '/yonetim/oturumac');

    Route::match(['get', 'post'], '/oturumac', [ManagementUserController::class, 'login'])->name('management.login');
    Route::get('/oturumukapat', [ManagementUserController::class, 'logout'])->name('management.logout');

    Route::group(['middleware' => 'management'], function () {
    Route::get('/anasayfa', [ManagementIndexController::class, 'index'])->name('management.index');

    Route::group(['prefix' => 'kullanici'], function () {
        Route::match(['get', 'post'], '/', [ManagementUserController::class, 'index'])->name('management.user');
        Route::get('/ekle', [ManagementUserController::class, 'form'])->name('management.user.add');
        Route::get('/duzenle/{id}', [ManagementUserController::class, 'form'])->name('management.user.update');
        Route::get('/kaydet/{id?}', [ManagementUserController::class, 'form'])->name('management.user.update');
        Route::post('/kaydet/{id?}', [ManagementUserController::class, 'save'])->name('management.user.save');
        Route::get('/sil/{id}', [ManagementUserController::class, 'delete'])->name('management.user.delete');
    });

    Route::group(['prefix' => 'kategoriler'], function () {
        Route::match(['get', 'post'], '/', [ManagementCategoryController::class, 'index'])->name('management.category');
        Route::get('/ekle', [ManagementCategoryController::class, 'form'])->name('management.category.add');
        Route::get('/duzenle/{id}', [ManagementCategoryController::class, 'form'])->name('management.category.update');
        Route::get('/kaydet/{id?}', [ManagementCategoryController::class, 'form'])->name('management.category.update');
        Route::post('/kaydet/{id?}', [ManagementCategoryController::class, 'save'])->name('management.category.save');
        Route::get('/sil/{id}', [ManagementCategoryController::class, 'delete'])->name('management.category.delete');
    });

    Route::group(['prefix' => 'siparisler'], function () {
        Route::match(['get', 'post'], '/', [ManagementOrderController::class, 'index'])->name('management.order');
        Route::get('/ekle', [ManagementOrderController::class, 'form'])->name('management.order.add');
        Route::get('/duzenle', [ManagementOrderController::class, 'form'])->name('management.order.update');
        Route::get('/kaydet/{id?}', [ManagementOrderController::class, 'form'])->name('management.order.update');
        Route::post('/kaydet/{id?}', [ManagementOrderController::class, 'save'])->name('management.order.save');
        Route::get('/sil/{id}', [ManagementOrderController::class, 'delete'])->name('management.order.delete');
    });

    Route::group(['prefix' => 'urunler'], function () {
        Route::match(['get', 'post'], '/', [ManagementProductController::class, 'index'])->name('management.product');
        Route::get('/ekle', [ManagementProductController::class, 'form'])->name('management.product.add');
        Route::get('/duzenle', [ManagementProductController::class, 'form'])->name('management.product.update');
        Route::get('/kaydet/{id?}', [ManagementProductController::class, 'form'])->name('management.product.update');
        Route::post('/kaydet/{id?}', [ManagementProductController::class, 'save'])->name('management.product.save');
        Route::get('/sil/{id}', [ManagementProductController::class, 'delete'])->name('management.product.delete');
    });
});
});


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/kategoriler/{slug_collectionname}', [CategoryController::class, 'index'])->name('categories');
Route::get('/urunler/{slug_productname}', [ProductController::class, 'index'])->name('products');
Route::post('/ara', [ProductController::class, 'search'])->name('search');
Route::get('/ara', [ProductController::class, 'search'])->name('search');

Route::group(['prefix' => 'sepet'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/ekle', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/kaldir/{rowid}', [CartController::class, 'delete'])->name('cart.delete');
    Route::delete('/bosalt', [CartController::class, 'unload'])->name('cart.unload');
    Route::patch('/guncelle/{rowid}', [CartController::class, 'update'])->name('cart.update');
});
Route::group(['middleware' => 'auth'], function () {
Route::group(['prefix' => 'favoriurunler'], function () {
    Route::get('/', [FavoriteProductsController::class, 'index'])->name('favorite_products');
    Route::post('/ekle', [FavoriteProductsController::class, 'add'])->name('favorite_products.add');
    Route::get('/kaldir/{id}', [FavoriteProductsController::class, 'delete'])->name('favorite_products.delete');
    Route::get('/koleksiyon', [FavoriteProductsController::class, 'collection'])->name('collection');
    Route::get('/koleksiyon/{slug_collectionname}', [FavoriteProductsController::class, 'collection_product'])->name('collection_product');
    Route::post('/koleksiyon/ekle', [FavoriteProductsController::class, 'collection_add'])->name('collection_add');
    Route::get('/koleksiyon/kaldir/{id}', [FavoriteProductsController::class, 'collection_delete'])->name('collection_delete');
    Route::post('/kolleksiyonaekle', [FavoriteProductsController::class, 'collection_product_add'])->name('collection_product_add');
});
});


Route::get('/odeme', [paymentController::class, 'index'])->name('payment');
Route::post('/odeme', [paymentController::class, 'pay'])->name('pay');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/siparisler', [OrderController::class, 'index'])->name('orders');
    Route::get('/siparisler/{id}', [OrderController::class, 'detail'])->name('order');
    Route::post('/siparisler/degerlendir/{id?}', [OrderController::class, 'evaluation_save'])->name('order.evaluation_save');
});

Route::group(['prefix' => 'kullanici'], function () {
    Route::get('/oturumac', [UserController::class, 'login_form'])->name('user.login');
    Route::post('/oturumac', [UserController::class, 'login']);
    Route::get('/kaydol', [UserController::class, 'register_form'])->name('user.register');
    Route::post('/kaydol', [UserController::class, 'register']);
    Route::get('/aktiflestir/{key}', [UserController::class, 'activate'])->name('activate');
    Route::post('/oturumukapat', [UserController::class, 'logout'])->name('user.logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/bilgilerim', [UserController::class, 'information'])->name('user.information');
        Route::post('/bilgilerim', [UserController::class, 'information_update'])->name('user.information_update');
    });

});
Route::get('test/mail', function () {
    return new App\Mail\UserRecordMail();
});
Route::get('/oturumac', [UserController::class, 'login_form'])->name('login');



