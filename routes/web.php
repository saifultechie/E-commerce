<?php

Route::get('/', [

	'uses'  => 'NewShopController@index',
	'as'    => '/'
	]);


Route::get('/category-product/{id}', [

	'uses'  => 'NewShopController@categoryProduct',
	'as'    => '/category-product'
	]);

Route::get('/product-details/{id}', [

	'uses'  => 'NewShopController@productDetails',
	'as'    => '/product-details'
	]);

Route::get('/category/add', [
    'uses'  =>  'CategoryController@index',
    'as'    =>  'add-category'
]);

Route::post('/category/save', [
    'uses'  =>  'CategoryController@saveCategoryInfo',
    'as'    =>  'new-category'
]);


Route::get('/category/manage', [
    'uses'  =>  'CategoryController@manageCategoryInfo',
    'as'    =>  'manage-category'
]);

Route::get('/category/unpublished/{id}', [
    'uses'  =>  'CategoryController@unpublishedCategoryInfo',
    'as'    =>  'unpublished-category'
]);

Route::get('/category/published/{id}', [
    'uses'  =>  'CategoryController@publishedCategoryInfo',
    'as'    =>  'published-category'
]);

Route::get('/category/edit/{id}', [
    'uses'  =>  'CategoryController@editCategoryInfo',
    'as'    =>  'edit-category'
]);

Route::post('/category/update', [
    'uses'  =>  'CategoryController@UpdateCategoryInfo',
    'as'    =>  'update-category'
]);

Route::get('/category/delete/{id}', [
    'uses'  =>  'CategoryController@deleteCategoryInfo',
    'as'    =>  'delete-category'
]);

Route::get('/add/brand', [
    'uses'  =>  'BrandController@index',
    'as'    =>  'add-brand'
]);

Route::post('/save/brand', [
    'uses'  =>  'BrandController@saveBrand',
    'as'    =>  'new-brand'
]);

Route::get('/manage/brand', [
    'uses'  =>  'BrandController@show',
    'as'    =>  'manage-brand'
]);

Route::get('/unpublished/brand/{id}', [
    'uses'  =>  'BrandController@unpublished',
    'as'    =>  'unpublished-brand'
]);

Route::get('/published/brand/{id}', [
    'uses'  =>  'BrandController@published',
    'as'    =>  'published-brand'
]);

Route::get('/edit/brand/{id}', [
    'uses'  =>  'BrandController@edit',
    'as'    =>  'edit-brand'
]);

Route::post('/update/brand', [
    'uses'  =>  'BrandController@update',
    'as'    =>  'update-brand'
]);


Route::get('/delete/brand/{id}', [
    'uses'  =>  'BrandController@destroy',
    'as'    =>  'delete-brand'
]);

Route::get('/add/product', [
    'uses'  =>  'ProductController@index',
    'as'    =>  'add-product'
]);


Route::post('/new/product', [
    'uses'  =>  'ProductController@saveProduct',
    'as'    =>  'new-product'
]);

Route::get('/manage/product', [
    'uses'  =>  'ProductController@manageProduct',
    'as'    =>  'manage-product'
]);

Route::get('/edit/product/{id}', [
    'uses'  =>  'ProductController@editProduct',
    'as'    =>  'edit-product'
]);

Route::post('/update/product', [
    'uses'  =>  'ProductController@updateProduct',
    'as'    =>  'update-product'
]);


Route::get('/mail-us', [

	'uses'  => 'NewShopController@mailUs',
	'as'    => '/mail-us'
	]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
