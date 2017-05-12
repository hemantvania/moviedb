<?php

use App\Http\Controllers\UserController;

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

Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::get('/', 'PagesController@home');

Route::get('home','PagesController@home');

Route::get('about', 'PagesController@about');

Route::get('contact', 'PagesController@contact');

Route::get('login', [ 'as' => 'login', 'uses' => 'PagesController@login']);

Route::get('signup','PagesController@signup');

Route::get('posts', 'PostsController@index');
Route::get('post/{id}', 'PostsController@show');

Route::group(['middleware' => 'auth'], function(){
    Route::get('addpost', 'PostsController@addpost');
    Route::get('profile', 'UserController@profile');
    Route::get('profile/edit','UserController@edit');
    Route::put('profile/edit', 'UserController@update');
    Route::post('submitpost', 'PostsController@save');
    Route::get('/profile-pic','ProfilePicsController@create');
    Route::post('/profile-pic','ProfilePicsController@store');
    Route::get('/gallery', 'UserController@gallery');
});

Route::get('user/{id}','UserController@profile');

Route::get('user/{id}/posts','UserController@posts');

Route::get('user/{id}/gallery','UserController@gallery');

Route::post('search', 'SearchController@search');

Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
   // Route::get('/','Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::get('/','AdminController@index')->name('admin.dashboard');

});

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin','AdminController@index')->name('admin.dashboard');
    Route::get('/admin/users', 'AdminController@users4admins')->name('admin.users');
    Route::get('/admin/home','AdminController@home')->name('admin.home');
    Route::get('/admin/{id}/delete', 'AdminController@delete')->name('user.delete');

});

Route::get('/sendemail','SendMailController@sendemail');

Route::get('/verifymail/{id}/{token}', 'UserController@verifymail');

Route::get('/success','UserController@success');

