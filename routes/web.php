<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CategoryController;
use App\Http\Controllers\Customer\FavoriteProductController;
use App\Http\Controllers\Customer\IndexController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\UserController;
use App\Http\Controllers\Customer\ContactController;
use App\Http\Controllers\Customer\AboutUsController;
use App\Http\Controllers\Management\ManagementBrandController;
use App\Http\Controllers\Management\ManagementCategoryController;
use App\Http\Controllers\Management\ManagementIndexController;
use App\Http\Controllers\Management\ManagementOrderController;
use App\Http\Controllers\Management\ManagementProductController;
use App\Http\Controllers\Management\ManagementUserController;
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
        Route::match(['get', 'post'], '/copkutusu', [ManagementOrderController::class, 'trash'])->name('management.order.trash');
        Route::get('/geriyükle/{id}', [ManagementOrderController::class, 'trash_restore'])->name('management.order.restore');
        Route::get('/kaldir/{id}', [ManagementOrderController::class, 'trash_remove'])->name('management.order.remove');
    });

    Route::group(['prefix' => 'urunler'], function () {
        Route::match(['get', 'post'], '/', [ManagementProductController::class, 'index'])->name('management.product');
        Route::get('/ekle', [ManagementProductController::class, 'form'])->name('management.product.add');
        Route::get('/duzenle', [ManagementProductController::class, 'form'])->name('management.product.update');
        Route::get('/kaydet/{id?}', [ManagementProductController::class, 'form'])->name('management.product.update');
        Route::post('/kaydet/{id?}', [ManagementProductController::class, 'save'])->name('management.product.save');
        Route::get('/sil/{id}', [ManagementProductController::class, 'delete'])->name('management.product.delete');
        Route::match(['get', 'post'], '/copkutusu', [ManagementProductController::class, 'trash'])->name('management.product.trash');
        Route::get('/geriyükle/{id}', [ManagementProductController::class, 'trash_restore'])->name('management.product.restore');
        Route::get('/kaldir/{id}', [ManagementProductController::class, 'trash_remove'])->name('management.product.remove');
    });

    Route::group(['prefix' => 'markalar'], function () {
        Route::match(['get', 'post'], '/', [ManagementBrandController::class, 'index'])->name('management.brand');
        Route::get('/ekle', [ManagementBrandController::class, 'form'])->name('management.brand.add');
        Route::get('/duzenle', [ManagementBrandController::class, 'form'])->name('management.brand.update');
        Route::get('/kaydet/{id?}', [ManagementBrandController::class, 'form'])->name('management.brand.update');
        Route::post('/kaydet/{id?}', [ManagementBrandController::class, 'save'])->name('management.brand.save');
        Route::get('/sil/{id}', [ManagementBrandController::class, 'delete'])->name('management.brand.delete');
    });
});
});


Route::get('/', [IndexController::class, 'index'])->name('customer.index');

Route::get('/kategoriler/{slug_collectionname}', [CategoryController::class, 'index'])->name('customer.categories');

Route::get('/urunler/{slug_productname}', [ProductController::class, 'index'])->name('customer.products');

Route::post('/ara', [ProductController::class, 'search'])->name('customer.search');
Route::get('/ara', [ProductController::class, 'search'])->name('customer.search');

Route::get('/odeme', [paymentController::class, 'index'])->name('customer.payment');
Route::post('/odeme', [paymentController::class, 'pay'])->name('customer.pay');

Route::get('/iletisim', [ContactController::class, 'index'])->name('customer.contact');
Route::get('/hakkimizda', [AboutUsController::class, 'index'])->name('customer.about_us');
Route::post('/abone-ol', [UserController::class, 'subscriber'])->name('customer.subscriber');

Route::get('/oturumac', [UserController::class, 'login_form'])->name('customer.login');


Route::group(['prefix' => 'sepet'], function () {
    Route::get('/', [CartController::class, 'index'])->name('customer.cart');
    Route::post('/ekle', [CartController::class, 'add'])->name('customer.cart.add');
    Route::delete('/kaldir/{rowid}', [CartController::class, 'delete'])->name('customer.cart.delete');
    Route::delete('/bosalt', [CartController::class, 'unload'])->name('customer.cart.unload');
    Route::patch('/guncelle/{rowid}', [CartController::class, 'update'])->name('customer.cart.update');
});
Route::group(['middleware' => 'auth'], function () {
Route::group(['prefix' => 'favoriurunler'], function () {
    Route::get('/', [FavoriteProductController::class, 'index'])->name('customer.favorite_products');
    Route::post('/ekle', [FavoriteProductController::class, 'add'])->name('customer.favorite_products.add');
    Route::get('/kaldir/{id}', [FavoriteProductController::class, 'delete'])->name('customer.favorite_products.delete');
    Route::get('/koleksiyon', [FavoriteProductController::class, 'collection'])->name('customer.collection');
    Route::get('/koleksiyon/{slug_collectionname}', [FavoriteProductController::class, 'collection_product'])->name('customer.collection.detail');
    Route::post('/koleksiyon/ekle', [FavoriteProductController::class, 'collection_add'])->name('customer.collection.add');
    Route::get('/koleksiyon/kaldir/{id}', [FavoriteProductController::class, 'collection_delete'])->name('customer.collection.delete');
    Route::post('/kolleksiyonaekle', [FavoriteProductController::class, 'collection_product_add'])->name('customer.collection_product.add');
});
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/siparisler', [OrderController::class, 'index'])->name('customer.orders');
    Route::get('/siparisler/{id}', [OrderController::class, 'detail'])->name('customer.order');
    Route::get('/siparisdegegerlendir/{id}', [OrderController::class, 'reviews'])->name('customer.order.reviews');
    Route::post('/siparisler/degerlendir/{id?}', [OrderController::class, 'evaluation_save'])->name('customer.order.evaluation_save');
});

Route::group(['prefix' => 'kullanici'], function () {
    Route::get('/islemler', [UserController::class, 'operations'])->name('customer.user.operations');
    Route::post('/oturumac', [UserController::class, 'login'])->name('customer.user.login');
    Route::post('/kaydol', [UserController::class, 'register'])->name('customer.user.register');
    Route::get('/aktiflestir/{key}', [UserController::class, 'activate'])->name('customer.activate');
    Route::post('/oturumukapat', [UserController::class, 'logout'])->name('customer.user.logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/bilgilerim', [UserController::class, 'information'])->name('customer.user.information');
        Route::post('/bilgilerim', [UserController::class, 'information_update'])->name('customer.user.information_update');
    });
});



