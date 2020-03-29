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
    return view('welcome');
});

Route::get('demo',function(){
	return view('admin.theloai.danhsach');
});

Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','loaitinController@getList')->name('loaitin');
		Route::post('add','loaitinController@addLoaiTin')->name('addLoaiTin');
		Route::post('edit','loaitinController@editLoaiTin')->name('editLoaiTin');
		Route::get('menu','loaitinController@changeMenu')->name('changeMenu');
		Route::get('gioithieu','loaitinController@changeGioiThieu')->name('changeGioiThieu');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','tintucController@getList')->name('tintuc');
		Route::get('themtin','tintucController@showAdd')->name('showAddTin');
		Route::post('add','tintucController@addTin')->name('addTin');
		Route::get('suatin/{id}','tintucController@showEdit')->name('showEditTin');
		Route::post('edit','tintucController@editTin')->name('editTin');
		Route::get('changeSlide','tintucController@changeSlide')->name('changeSlide');
		Route::get('changeThongBao','tintucController@changeThongBao')->name('changeThongBao');
	});
});
Route::get('menu','loaitinController@getMenu')->name('menu');
Route::get('home','homeController@getHome')->name('home');
Route::get('tintuc/{tentin}','tintucController@viewTin')->name('viewTin');
Route::get('loaitin/{tentin}','tintucController@listNews')->name('listNews');
Route::get('logout','dangnhapcontroller@logout')->name('logout');
Route::get('data','DataController@defaultdata')->name('data');
Route::get('infor','dangnhapController@infor')->name('infor');
Route::post('dangnhap','dangnhapController@Login')->name('login');
Route::get('addadmin','dangkycontroller@getaddadmin')->name('getaddadmin')->middleware('isadmin');
Route::post('themadmin','dangkycontroller@addadmin')->name('addadmin');