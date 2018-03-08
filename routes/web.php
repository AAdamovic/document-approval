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


// USERS ROUTES START
Route::get('/', 'IndexController@index')->name('homepage');

Route::any('/users/login', 'UsersController@login')->name('login');

Route::get('/users/welcome', 'UsersController@welcome')->name('users-welcome');

Route::any('/users/create', 'UsersController@create')->name('users-create');

Route::get('/users/logout', 'UsersController@logout')->name('logout');

Route::get('/users', 'UsersController@index')->name('users-list');

Route::any('/users/edit/{user}', 'UsersController@edit')->name('users-edit');

Route::get('/users/delete/{user}', 'UsersController@delete')->name('users-delete');

Route::any('/users/change-password/{user}', 'UsersController@changePassword')->name('users-change-password');

Route::any('/users/password-recovery', 'UsersController@passwordRecovery')->name('users-password-recovery');

Route::any('/users/password-reset/{token}', 'UsersController@passwordReset')->name('users-password-reset');
// USERS ROUTES END

//ROLE ROUTES START
Route::any('/users/roles/create', 'RolesController@create')->name('roles-create');
Route::any('/users/roles/edit/{role}', 'RolesController@edit')->name('roles-edit');
Route::get('/users/roles/delete/{role}', 'RolesController@delete')->name('roles-delete');
Route::any('/users/roles/', 'RolesController@index')->name('roles-list');
//ROLE ROUTES END

//DOCUMENT ROUTES START 
Route::any('/documents/create', 'DocumentsController@create')->name('documents-create');
Route::any('/documents/edit/{document}', 'DocumentsController@edit')->name('documents-edit');
Route::get('/documents/delete/{document}', 'DocumentsController@delete')->name('documents-delete');
Route::any('/documents/view', 'DocumentsController@index')->name('documents-list');
Route::get('/documents/download/{document}', 'DownloadController@download')->name('download');
Route::get('/storage/uploads/', 'DownloadController@download')->name('direct');
//DOCUMENT ROUTES END



