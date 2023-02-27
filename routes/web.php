<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('/form-submit','FormController@submit');

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin/login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

    Route::group(['prefix' => 'contacts','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\FormController@index');
        Route::get('/view/{id}', 'Admin\FormController@show');
    });

    Route::group(['prefix' => 'sections','middleware' => 'auth'], function() {
        Route::get('/edit/{id}', 'Admin\SectionController@edit');
        Route::post('/update', 'Admin\SectionController@update');
        Route::get('/delete/{id}', 'Admin\SectionController@delete');
        Route::get('/delete-slide/{id}', 'Admin\SectionController@deleteSlide');
    });

    Route::group(['prefix' => 'home','middleware' => 'auth'], function() {
        Route::get('/icons', 'Admin\HomeController@icons');
        Route::post('/icons/update', 'Admin\HomeController@update');
    });

    Route::group(['prefix' => 'leadership','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\LeadershipController@index');
        Route::get('/create', 'Admin\LeadershipController@create');
        Route::post('/store', 'Admin\LeadershipController@store');
        Route::post('/update', 'Admin\LeadershipController@update');
        Route::get('/edit/{id}', 'Admin\LeadershipController@edit');
        Route::get('/delete/{id}', 'Admin\LeadershipController@delete');
    });

    Route::group(['prefix' => 'services','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\ServiceController@index');
        Route::get('/create', 'Admin\ServiceController@create');
        Route::post('/store', 'Admin\ServiceController@store');
        Route::post('/update', 'Admin\ServiceController@update');
        Route::get('/edit/{id}', 'Admin\ServiceController@edit');
        Route::get('/delete/{id}', 'Admin\ServiceController@delete');
        Route::get('/delete-item/{id}', 'Admin\ServiceController@deleteItem');
    });

    Route::group(['prefix' => 'benefits','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\BenefitController@index');
        Route::get('/create', 'Admin\BenefitController@create');
        Route::post('/store', 'Admin\BenefitController@store');
        Route::post('/update', 'Admin\BenefitController@update');
        Route::get('/edit/{id}', 'Admin\BenefitController@edit');
        Route::get('/delete/{id}', 'Admin\BenefitController@delete');
    });

    Route::group(['prefix' => 'clients','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\BenefitController@index');
        Route::get('/create', 'Admin\BenefitController@create');
        Route::post('/store', 'Admin\BenefitController@store');
        Route::post('/update', 'Admin\BenefitController@update');
        Route::get('/edit/{id}', 'Admin\BenefitController@edit');
        Route::get('/delete/{id}', 'Admin\BenefitController@delete');
    });

    Route::group(['prefix' => 'client-categories','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\ClientCategoryController@index');
        Route::get('/create', 'Admin\ClientCategoryController@create');
        Route::post('/store', 'Admin\ClientCategoryController@store');
        Route::post('/update', 'Admin\ClientCategoryController@update');
        Route::get('/edit/{id}', 'Admin\ClientCategoryController@edit');
        Route::get('/delete/{id}', 'Admin\ClientCategoryController@delete');
    });

    Route::group(['prefix' => 'clients','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\ClientController@index');
        Route::get('/create', 'Admin\ClientController@create');
        Route::post('/store', 'Admin\ClientController@store');
        Route::post('/update', 'Admin\ClientController@update');
        Route::get('/edit/{id}', 'Admin\ClientController@edit');
        Route::get('/delete/{id}', 'Admin\ClientController@delete');
    });

    Route::group(['prefix' => 'our-team','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\TeamController@index');
        Route::get('/create', 'Admin\TeamController@create');
        Route::post('/store', 'Admin\TeamController@store');
        Route::post('/update', 'Admin\TeamController@update');
        Route::get('/edit/{id}', 'Admin\TeamController@edit');
        Route::get('/delete/{id}', 'Admin\TeamController@delete');
    });
});

Route::get('/terms-and-conditions/download', 'PageController@download');

Auth::routes();

Route::get('/{page}', function ($page) {
    if (view()->exists($page)){
        $currentPage = $page;

        return view($page,compact('currentPage'));
    }

    return view('404');
});

