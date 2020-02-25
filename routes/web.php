<?php

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
    return view('welcome');
});

Route::post('/api/addproduct', 'ProductController@AddProduct')->name('addproduct');

Route::get('/api/getproduct', 'ProductController@GetProduct')->name('getproduct');

Route::get('/api/deleteproduct/{id}', 'ProductController@deleteProduct')->name('delete');

Route::get('/api/edit/{id}', 'ProductController@getProductDetail')->name('edit');
Route::post('/api/update/{id}', 'ProductController@updateProduct')->name('update');

// Route::get('/{any}', function () {
//     return view('app');
// })->where('any', '.*');

Route::middleware(['login'])->group(function () {
    Route::post('/api/register', 'MemberController@registerProcess')->name('register-process');
    Route::post('/api/login', 'MemberController@loginProcess')->name('login-process');
    Route::get('/api/logout', 'MemberController@Logout')->name('logout');
});
