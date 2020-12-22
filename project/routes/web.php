<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/danh-muc/{slug}', 'Frontend\CategoryController@index')->name('category');
Route::get('/danh-muc/api/{slug}', 'Frontend\CategoryController@create')->name('category2');
Route::get('/danh-muc/item/{slug}', 'Frontend\ProductController@index')->name('detailItem');
Route::post('/search-item', 'Frontend\CategoryController@findItem')->name('search');
Route::get('/signin', 'Frontend\UserController@index')->name('login');
Route::post('/signin', 'Frontend\UserController@store')->name('login');
Route::post('/forgot-password', 'Frontend\UserController@forgot_password')->name('forgot_password');
Route::get('/forgot-password/view/{token}', 'Frontend\UserController@confirm_password')->name('confirm_password');
Route::post('/forgot-password/confirm/{email}', 'Frontend\UserController@confirm_password_post')->name('confirm_password_post');
Route::post('/register', 'Frontend\UserController@create')->name('register');
Route::get('/home/user', 'Frontend\UserController@show')->name('my_account');
Route::get('/home/user/logout', 'Frontend\UserController@logout')->name('logout');
Route::get('/home/user/listorder', 'Frontend\UserController@listOrder')->name('list_order');
Route::post('/home/user/change-info', 'Frontend\UserController@changeInfo')->name('change_info');
Route::get('/home/user/order/detail/{id}', 'Frontend\UserController@detail_order')->name('detail_order');
Route::get('/home/danh-muc/cart/add/{id}', 'Frontend\CartController@add')->name('addTocart');
Route::get('/home/danh-muc/cart/delete/{id}', 'Frontend\CartController@delete')->name('delete_item_cart');
Route::get('/home/api/cart/delete/{id}', 'Frontend\CartController@apidelete')->name('apidelete');
Route::get('/home/api/cart/', 'Frontend\CartController@apiCart')->name('apicart');
Route::get('/home/danh-muc/cart/detail', 'Frontend\CartController@detail')->name('detail_cart');
Route::post('/home/danh-muc/cart/update', 'Frontend\CartController@update')->name('update_cart');
Route::get('/home/danh-muc/cart/plus/{id}', 'Frontend\CartController@plus')->name('plus_cart');
Route::get('/home/danh-muc/cart/mines/{id}', 'Frontend\CartController@mines')->name('mines_cart');
Route::get('/home/danh-muc/cart/checkout', 'Frontend\CartController@index')->name('checkout');
Route::post('/home/danh-muc/cart/checkout', 'Frontend\CartController@create')->name('checkout');
Route::get('/home/cart/checkout/district/{id}', 'Frontend\CartController@district')->name('district');
Route::get('/home/cart/checkout/ward/{id}', 'Frontend\CartController@ward')->name('ward');
//wish list user 
Route::get('wishlist-add/{id}','Frontend\WishListController@create')->name('add_wishlist');
Route::get('user/wishlist','Frontend\WishListController@wishlist_view')->name('wishlist');
Route::get('user/wishlist/delete/{id}','Frontend\WishListController@destroy')->name('delete_wishlist');
//frotnend contact
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact');
Route::get('/about', 'Frontend\HomeController@about')->name('about');
//tin tuc
Route::get('/blogs', 'Frontend\BlogController@index')->name('blogs');
Route::get('/blogs/detail/{id}', 'Frontend\BlogController@detail')->name('detail_blog');
Route::post('/blogs/find', 'Frontend\BlogController@find')->name('search_blog');

//backend
Route::get('administrator','backend\AdminCotroller@login')->name('checkAdmin');
Route::post('administrator','backend\AdminCotroller@checkManage')->name('admin');
Route::prefix('manage')->middleware('checkout')->group(function () {
    //admin
    Route::get('dashboard','backend\AdminCotroller@index')->name('manage');
    Route::get('change-password','backend\AdminCotroller@view')->name('change_pass_admin');
    Route::post('change-password','backend\AdminCotroller@change')->name('change_password');

    //category
    Route::get('danh-muc','backend\CategoryController@interface')->name('categoryall');
    Route::get('danh-muc/create','backend\CategoryController@index')->name('create_category');
    Route::post('danh-muc/create','backend\CategoryController@create')->name('create_category');
    Route::get('danh-muc/edit/show/{id}','backend\CategoryController@ediInterface')->name('edit_category');
    Route::post('danh-muc/edit/{id}','backend\CategoryController@edit')->name('edit_category_post');
    Route::get('danh-muc/delete/{id}','backend\CategoryController@destroy')->name('delete_category');
    Route::get('danh-muc/api/{id}','backend\CategoryController@apiCategory');

    //product
    Route::get('san-pham','backend\ProductController@index')->name('productall');
    Route::get('danh-muc/san-pham','backend\ProductController@interfaceCreate')->name('create_product');
    Route::post('danh-muc/san-pham','backend\ProductController@create')->name('create_product_post');
    Route::get('danh-muc/san-pham/delete/{id}','backend\ProductController@destroy')->name('delete_product');
    Route::get('danh-muc/san-pham/edit/{id}','backend\ProductController@edit')->name('edit_product');
    Route::post('danh-muc/san-pham/post/edit/{id}','backend\ProductController@update')->name('edit_post_product');
    Route::post('danh-muc/san-pham/search','backend\ProductController@search')->name('search_product');
    Route::get('order','backend\OrderController@index')->name('order_view');
    Route::get('order/detail/{id}','backend\OrderController@edit')->name('order_detail_view');
    Route::get('order/create/{id}','backend\OrderController@create')->name('accept_order');
    Route::get('order/delete/{id}','backend\OrderController@destroy')->name('delete_order');
    Route::get('option', 'backend\OptionController@index')->name('option');
    Route::get('option/create', 'backend\OptionController@create_form')->name('create_option_view');
    Route::post('option/create', 'backend\OptionController@create')->name('create_option');
    Route::get('option/delete/{id}', 'backend\OptionController@destroy')->name('delete_option');
    Route::get('option/edit/{id}', 'backend\OptionController@edit')->name('edit_option_view');
    Route::post('option/edit/{id}', 'backend\OptionController@update')->name('edit_option');
    Route::get('option/{id}', 'backend\OptionController@option');
    //slide page frontend
    Route::get('slide/index','backend\SlideController@index')->name('slide');
    Route::get('slide/logo-header','backend\SlideController@logo_header')->name('logo_header');
    Route::get('slide/logo-footer','backend\SlideController@logo_footer')->name('logo_footer');
    Route::get('slide/create','backend\SlideController@create_inteface')->name('view_create_slide');
    Route::post('slide/create','backend\SlideController@create')->name('create_slide');
    Route::get('slide/edit/{id}','backend\SlideController@edit')->name('edit_slide');
    Route::post('slide/update/{id}','backend\SlideController@update')->name('update_slide');
    Route::get('slide/delete/{id}','backend\SlideController@destroy')->name('delete_slide');
    Route::get('tin-tuc/','backend\PageController@index')->name('page');
    Route::get('tin-tuc/create','backend\PageController@create')->name('create_page');
    Route::post('tin-tuc/create','backend\PageController@add')->name('create_page_post');
    Route::get('tin-tuc/edit/{id}','backend\PageController@edit')->name('edit_page');
    Route::post('tin-tuc/update/{id}','backend\PageController@update')->name('update_page');
    Route::get('tin-tuc/delete/{id}','backend\PageController@destroy')->name('delete_page');
});

