<?php

use App\Http\Controllers\BeritaController;
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

// Register
Route::get('/register', 'auth\RegisterController@index')->name('register');
Route::post('/register', 'auth\RegisterController@register')->name('register');

// Login
Route::get('/login', 'auth\LoginController@index')->name('login');
Route::post('/login', 'auth\LoginController@login')->name('login');

Route::group(['middleware' => ['ceklogin']], function () {

    // Dashboard
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    //Berita
    Route::get('/berita', 'BeritaController@index')->name('berita');
    Route::get('/berita/create', 'BeritaController@addBerita')->name('add.berita');
    Route::post('/berita/create', 'BeritaController@create')->name('add.berita');
    Route::get('/berita/edit/{id}', 'BeritaController@editBerita')->name('edit.berita');
    Route::patch('/berita/edit/{id}', 'BeritaController@update')->name('update.berita');
    Route::delete('/berita/delete/{id}', 'BeritaController@destroy')->name('delete.berita');

    //Kegiatan
    Route::get('/kegiatan', 'KegiatanController@index')->name('kegiatan');
    Route::get('/kegiatan/create', 'KegiatanController@addKegiatan')->name('add.kegiatan');
    Route::post('/kegiatan/create', 'KegiatanController@create')->name('add.kegiatan');
    Route::get('/kegiatan/edit/{id}', 'KegiatanController@editKegiatan')->name('edit.kegiatan');
    Route::patch('/kegiatan/edit/{id}', 'KegiatanController@update')->name('update.kegiatan');
    Route::delete('/kegiatan/delete/{id}', 'KegiatanController@destroy')->name('delete.kegiatan');

    // User
    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/adduser', 'UserController@addUser')->name('add.user');
    Route::post('/adduser', 'UserController@create')->name('add.user');
    Route::get('/edituser/{id}', 'UserController@editUser')->name('edit.user');
    Route::patch('/updateuser/{id}', 'UserController@update')->name('update.user');
    Route::delete('/deleteuser/{id}', 'UserController@destroy')->name('delete.user');

    // Struktur
    Route::get('/struktur', 'StrukturController@index')->name('struktur');
    Route::get('/struktur/create', 'StrukturController@addStruktur')->name('add.struktur');
    Route::post('/struktur/create', 'StrukturController@create')->name('add.struktur');
    Route::get('/struktur/edit/{id}', 'StrukturController@editStruktur')->name('edit.struktur');
    Route::patch('/struktur/edit/{id}', 'StrukturController@update')->name('update.struktur');
    Route::delete('/struktur/delete/{id}', 'StrukturController@destroy')->name('delete.struktur');

    // Logout
    Route::get('/logout', 'auth\LoginController@logout')->name('logout');
});
