<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('home', [Admin\HomeController::class, 'index'])->name('home');
    Route::get('admin/index', [Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/show={user}', [Admin\UserController::class, 'show'])->name('admin.users.show');
});
// 'prefix' ... URIの先頭を一括で指定 'Route::get('admin/*', )'
// 'as' ... 名前付きルートを一括で指定 ->name('admin.****');

//上記コードは以下と同じ
//Route::middleware(['middleware' => 'auth:admin'], function(){ 
//    Route::get('admin/home', [Admin\HomeController::class, 'index'])->name('admin.home');
//});


