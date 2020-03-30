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
		Route::get('danhsach','homeController@getListloaitin')->name('loaitin')->middleware('issuperadmin');
		Route::post('add','homeController@addLoaiTin')->name('addLoaiTin');
		Route::post('edit','homeController@editLoaiTin')->name('editLoaiTin');
		Route::get('del/{id}','homeController@deltl')->name('deltl');
		Route::get('menu','homeController@changeMenu')->name('changeMenu');
		Route::get('gioithieu','homeController@changeGioiThieu')->name('changeGioiThieu');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','homeController@getListtintuc')->name('tintuc')->middleware('issuperadmin');
		Route::get('themtin','homeController@showAdd')->name('showAddTin');
		Route::post('add','homeController@addTin')->name('addTin');
		Route::get('suatin/{id}','homeController@showEdit')->name('showEditTin');
		Route::post('edit','homeController@editTin')->name('editTin');
		Route::get('del/{id}','homeController@deltin')->name('deltin');
		Route::get('changeSlide','homeController@changeSlide')->name('changeSlide');
		Route::get('changeThongBao','homeController@changeThongBao')->name('changeThongBao');
	});
});
Route::get('menu','loaitinController@getMenu')->name('menu');
Route::get('home','homeController@getHome')->name('home');
Route::get('tintuc/{tieude}','homeController@viewTin')->name('viewTin');
Route::get('loaitin/{tieude}','homeController@listNews')->name('listNews');
Route::get('logout','dangnhapcontroller@logout')->name('logout');
Route::get('data','DataController@defaultdata')->name('data');
Route::get('infor','dangnhapController@infor')->name('infor');
Route::post('dangnhap','dangnhapController@Login')->name('login');
Route::get('addadmin','dangkycontroller@getaddadmin')->name('getaddadmin')->middleware('isadmin');
Route::post('themadmin','dangkycontroller@addadmin')->name('addadmin');