<?php

Route::get('locale/{locale}','MainController@changeLang')->name('locale');
Route::get('money/{money}','MainController@changeValue')->name('money');
Route::get('/logout','Auth\LoginController@logout')->name('get-logout');
Route::middleware(['set_locale'])-> group (function(){
    Auth::routes(['reset'=>false,
        'confirm'=>false,
        'verify'=>false,
    ]);
    Route::resource('feedback','feedbackController');
    Route::resource('posts', 'PostController');
    Route::get('extraOrder','Person\OrderController@individualOrderForm')->name('extra.order');
    Route::post('extraOrder','Person\OrderController@individualOrder')->name('extra.order.confirm');
    Route::post('extraOrderAuth','Person\OrderController@authIndividualOrder')->name('extra.authOrder.confirm');
    Route::middleware(['auth'])-> group (function(){
        Route::get('Person/orders/homeInd','Person\OrderController@indexInd')->name('order.indexInd.person');
        Route::get('Person/orders/home','Person\OrderController@index')->name('order.index.person');
        Route::get('Person/orders/{order}','Person\OrderController@show')->name('orders.show.person');
        Route::get('Person/ordersInd/{order_i}','Person\OrderController@showInd')->name('orders.show_i.person');

    Route::group([
    'namespace'=>'Admin',
    'prefix'=>'admin'
], function (){
    Route::group(['middleware'=>'is_admin'], function (){
        Route::get('/orders/home','OrderController@index')->name('home');
        Route::get('/orders/homeInd','OrderController@indexInd')->name('homeInd');
        Route::get('/orders/{order}','OrderController@show')->name('orders.show');
        Route::get('/orders_i/{order_i}','OrderController@showInd')->name('orders.show_i');
        Route::post('/orders/changePrice','OrderController@changePrice')->name('order.price');
        Route::put('/orders_i/changePrice/{id}','OrderController@update_i')->name('order.update_i');
        Route::resource('order', 'OrderController');
        Route::resource('categories','CategoryController');
        Route::resource('products', 'ProductController');
    });
});
    });
    Route::get('/','MainController@index')->name('index');
    Route::get('get-json','MainController@getJson');
    Route::get('data-chart','MainController@dataChart');
    Route::get('data-random','MainController@dataRandom');
    Route::get('socket-chart','RedisController@newEvent');
    Route::get('socket-message','RedisController@newMessage');
    Route::group(['prefix'=>'basket'],function (){
        Route::group(['middleware'=>'basket_not_empty'], function (){
            Route::get('/','BasketController@basket')->name('basket');
            Route::get('/place','BasketController@basketPlace')->name('basket-place');
            Route::post('/remove{id}','BasketController@basketRemove')->name('basket-remove');
            Route::post('/place','BasketController@basketConfirm')->name('basket-confirm');
        });
        Route::post('/add{id}','BasketController@basketAdd')->name('basket-add');
    });
    Route::post('/send','MailController@createdAccount')->name('createAcc');
    Route::get('/categories', 'MainController@categories')->name('categories');
    Route::get('/{category}', 'MainController@category')->name('category');
    Route::get('/{category}/{product?}', 'MainController@product')->name('product');
});




