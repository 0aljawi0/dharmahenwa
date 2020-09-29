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
    return redirect('home');
});

// Frontend
Route::get('home', [App\Http\Controllers\Web\Home::class, 'index'])->name('home');
Route::get('company-profile', [App\Http\Controllers\Web\CompanyProfile::class, 'index'])->name('company-profile');
Route::get('mission-vision-value', [App\Http\Controllers\Web\MissionVisionValue::class, 'index'])->name('mission-vision-value');

// Backend
Auth::routes(['register' => false]);

Route::get('dashboard', [App\Http\Controllers\Administrator\Dashboard::class, 'index'])->name('dashboard');
Route::get('user_logs', [App\Http\Controllers\Administrator\UserLogs::class, 'index'])->name('user_logs');
Route::post('summernote', [App\Http\Controllers\Administrator\Summernote::class, 'upload']);

Route::resource('users', App\Http\Controllers\Administrator\Users::class);
Route::resource('sliders', App\Http\Controllers\Administrator\Sliders::class);

Route::get('files', [App\Http\Controllers\Administrator\Files::class, 'index'])->name('files.index');
Route::get('files_all', [App\Http\Controllers\Administrator\Files::class, 'all'])->name('files.all');
Route::post('files', [App\Http\Controllers\Administrator\Files::class, 'store'])->name('files.store');
Route::delete('files/{id}', [App\Http\Controllers\Administrator\Files::class, 'destroy'])->name('files.destroy');

Route::resource('blogs', App\Http\Controllers\Administrator\Blogs::class);

Route::get('website', [App\Http\Controllers\Administrator\Website::class, 'index'])->name('website.index');
Route::post('website', [App\Http\Controllers\Administrator\Website::class, 'store'])->name('website.store');
Route::put('website/{key}', [App\Http\Controllers\Administrator\Website::class, 'update'])->name('website.update');

Route::get('manage-company-profile', [App\Http\Controllers\Administrator\ManageCompanyProfile::class, 'index'])->name('manage-company-profile.index');
Route::post('manage-company-profile', [App\Http\Controllers\Administrator\ManageCompanyProfile::class, 'store'])->name('manage-company-profile.store');
Route::put('manage-company-profile/{key}', [App\Http\Controllers\Administrator\ManageCompanyProfile::class, 'update'])->name('manage-company-profile.update');

Route::get('manage-mvv', [App\Http\Controllers\Administrator\ManageMVV::class, 'index'])->name('manage-mvv.index');
Route::post('manage-mvv', [App\Http\Controllers\Administrator\ManageMVV::class, 'store'])->name('manage-mvv.store');
Route::put('manage-mvv/{key}', [App\Http\Controllers\Administrator\ManageMVV::class, 'update'])->name('manage-mvv.update');
