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
    return redirect('dashboard');
});

Auth::routes(['register' => false]);

Route::get('dashboard', [App\Http\Controllers\Administrator\Dashboard::class, 'index'])->name('dashboard');
Route::get('user_logs', [App\Http\Controllers\Administrator\UserLogs::class, 'index'])->name('user_logs');

Route::resource('users', App\Http\Controllers\Administrator\Users::class);
Route::resource('sliders', App\Http\Controllers\Administrator\Sliders::class);

Route::get('files', [App\Http\Controllers\Administrator\Files::class, 'index'])->name('files.index');
Route::get('files_all', [App\Http\Controllers\Administrator\Files::class, 'all'])->name('files.all');
Route::post('files', [App\Http\Controllers\Administrator\Files::class, 'store'])->name('files.store');
Route::delete('files/{id}', [App\Http\Controllers\Administrator\Files::class, 'destroy'])->name('files.destroy');
