<?php

/*
|-----------------------------------------------------------------------------------------------------------------------
| AUTH
|-----------------------------------------------------------------------------------------------------------------------
*/

// Home
Route::get('/', 'IndexController@index')
    ->name('home')
    ->middleware(['auth']);

// Home
Route::get('/test', 'TestController@index')
    ->name('test');

// Login
Route::get('/login', 'Auth\LoginController@index')
    ->name('login')
    ->middleware(['guest']);

Route::post('/login', 'Auth\LoginController@login')
    ->name('login.user')
    ->middleware(['guest']);

// Logout
Route::get('/logout', 'Auth\LogoutController@index')
    ->name('logout')
    ->middleware(['auth']);


/*
|-----------------------------------------------------------------------------------------------------------------------
| ADMIN
|-----------------------------------------------------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {

    Route::get('/', 'Admin\IndexController@index')
        ->name('admin');

});

/*
|-----------------------------------------------------------------------------------------------------------------------
| MASTER
|-----------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'master', 'middleware' => ['auth', 'role:admin|master']], function() {

    Route::get('/', 'Master\IndexController@index')
        ->name('master');

});

/*
|-----------------------------------------------------------------------------------------------------------------------
| PROVIDER
|-----------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'provider', 'middleware' => ['auth', 'role:provider']], function() {

    Route::get('/', 'Provider\IndexController@index')
        ->name('provider');

    Route::group(['prefix' => 'views'], function() {

        Route::get('/orders', 'Provider\Views\OrdersController@lists')
            ->name('provider.views.orders.list');

        Route::get('/profile', 'Provider\Views\ProfileController@info')
            ->name('provider.views.profile.info');

        Route::get('/alert', 'Provider\Views\AlertController@form')
            ->name('provider.views.alert.form');

        Route::get('/menus', 'Provider\Views\MenusController@lists')
            ->name('provider.views.menus.list');

        Route::get('/dishes', 'Provider\Views\DishesController@lists')
            ->name('provider.views.dishes.list');

    });

});

/*
|-----------------------------------------------------------------------------------------------------------------------
| DIRECTIVES
|-----------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'directives', 'middleware' => []], function() {

    Route::get('/pagination', 'Directives\IndexController@pagination')
        ->name('directives.pagination');

    Route::get('/menu', 'Directives\IndexController@menu')
        ->name('directives.menu');

    Route::get('/dish', 'Directives\IndexController@dish')
        ->name('directives.dish');

});

/*
|-----------------------------------------------------------------------------------------------------------------------
| FACTORIES
|-----------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'factories', 'middleware' => ['auth']], function() {

    Route::get('/dishes', 'Factories\DishesController@getDishes')
        ->name('factories.dishes.list');

    Route::get('/categories', 'Factories\CategoriesController@getCategories')
        ->name('factories.categories.list');

});

/*
|-----------------------------------------------------------------------------------------------------------------------
| API
|-----------------------------------------------------------------------------------------------------------------------
*/
Route::group(['prefix' => 'api', 'middleware' => []], function() {

    Route::group(['prefix' => 'v1', 'middleware' => []], function() {

        Route::get('/', 'Api\V1\IndexController@index')
            ->name('api.v1');

    });

});

