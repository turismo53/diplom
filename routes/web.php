<?php

Route::get('locale/{locale}','MainController@changeLang')->name('locale');

Route::get('/logout','Auth\LoginController@logout')->name('get-logout');

Route::middleware(['set_locale'])-> group (function(){
    Auth::routes(['reset'=>false,
        'confirm'=>false,
        'verify'=>false,
    ]);
    Route::group([
    'namespace'=>'Admin',
    'middleware'=>'auth',
    'prefix'=>'admin'
], function (){
    Route::group(['middleware'=>'is_admin'], function (){
        Route::get('/orders/home','OrderController@index')->name('home');
        Route::get('/orders/{order}','OrderController@show')->name('orders.show');
        Route::resource('categories','CategoryController');
        Route::resource('products', 'ProductController');
    });
});



    Route::get('/','MainController@index')->name('index');


    Route::group(['prefix'=>'basket'],function (){
        Route::group(['middleware'=>'basket_not_empty'], function (){

            Route::get('/','BasketController@basket')->name('basket');
            Route::get('/place','BasketController@basketPlace')->name('basket-place');
            Route::post('/remove{id}','BasketController@basketRemove')->name('basket-remove');
            Route::post('/place','BasketController@basketConfirm')->name('basket-confirm');

        });
        Route::post('/add{id}','BasketController@basketAdd')->name('basket-add');
    });





    Route::get('/categories', 'MainController@categories')->name('categories');

    Route::get('/{category}', 'MainController@category')->name('category');

    Route::get('/{category}/{product?}', 'MainController@product')->name('product');});




