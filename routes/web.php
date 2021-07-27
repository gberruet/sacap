<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\SacapPermission\Models\Role;
use App\SacapPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;

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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/test', function () {
    $user = User::find(2);

    //$user->roles()->sync([2]);
    Gate::authorize('haveaccess','role.show');
    return $user;
    //return $user->havePermission('role.create');
})->middleware('auth');

Route::resource('/role', 'RoleController')->names('role')->middleware('auth');
Route::resource('/user', 'UserController')->names('user')->middleware('auth');
Route::resource('/student', 'StudentController')->names('student')->middleware('auth');
Route::resource('/category', 'CategoryController')->names('category')->middleware('auth');
Route::resource('/subcategory', 'SubCategoryController')->names('subcategory')->middleware('auth');
