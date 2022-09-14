<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EditorController;

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
    
// Route Login
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('postlogin', [AuthController::class, 'postlogin'])->name('postlogin'); 
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// End Route Login

// Auth

// check Admin || Guru
    Route::group(['middleware' => ['auth']], function () {
        Route::group(['middleware' => ['login:admin']], function () {
            Route::get('admin', [AdminController::class, 'index'])->name('admin',[
                "title" => "Dashboardadmin"]);
        });
        Route::group(['middleware' => ['login:editor']], function () {
            Route::get('editor', [EditorController::class, 'index'])->name('editor',[
                "title" => "Dashboardguru"]);
        });
        Route::get('/','App\Http\Controllers\AuthController@dashboard')->name('dashboard');

        // Route kelas
        Route::get('/kelas','App\Http\Controllers\KelasController@index')->name('index',[
            "title" => "Datakelas"]);
        Route::get('/create-kelas','App\Http\Controllers\KelasController@create')->name('create');
        Route::post('/save-Kelas', [KelasController::class, 'store'])->name('simpan');
        Route::put('/update-kelas/{id}', [KelasController::class, 'update'])->name('update');
        Route::get('/edit-kelas/{id}','App\Http\Controllers\KelasController@edit')->name('edit');
        Route::get('/delete-kelas/{id}',[KelasController::class, 'destroy'])->name('delete');
        // end Route Kelas

        // Route guru
        Route::get('guru','App\Http\Controllers\GuruController@index')->name('guru',[
            "title" => "Dataguru"]);
        Route::get('create-guru','App\Http\Controllers\GuruController@create')->name('create-guru');
        Route::post('save-guru', [GuruController::class, 'store'])->name('simpan-guru');
        Route::put('update-guru/{id}', [GuruController::class, 'update'])->name('update-guru');
        Route::get('edit-guru/{id}','App\Http\Controllers\GuruController@edit')->name('edit-guru');
        Route::get('delete-guru/{id}',[GuruController::class, 'destroy'])->name('delete-guru');
        // End Route Guru

        // Route Agenda
        Route::get('agenda','App\Http\Controllers\AgendaController@index')->name('agenda',[
                    "title" => "Dataagendasekolah"]);
        Route::get('create-agenda','App\Http\Controllers\AgendaController@create')->name('create-agenda');
        Route::post('save-agenda', [AgendaController::class, 'store'])->name('simpan-agenda');
        Route::put('update-agenda/{id}', [AgendaController::class, 'update'])->name('update-agenda');
        Route::get('edit-agenda/{id}','App\Http\Controllers\AgendaController@edit')->name('edit-agenda');
        Route::get('delete-agenda/{id}',[AgendaController::class, 'destroy'])->name('delete-agenda');
        // End Route Agenda

    });

// Route::group(['middleware' => ['auth']], function() {

//     Route::get('dataagenda', function () {
//         return view('layout.formagenda',[
//         "title" => "Dataagendasekolah"
//         ]);
//     });

//     Route::get('datakelas', function () {
//         return view('layout.kelas',[
//             "title" => "datakelas"
//         ]);
//     });

//     Route::get('dataguru', function () {
//         return view('layout.teacher',[
//         "title" => "dataguru"
//     ]);
//     });
// });

// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::post('proses_login', [AuthController::class, 'proses_login'])->name('login.custom'); 

// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('dashboard', [AuthController::class, 'dashboard']); 

