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
Route::get('about-company-profile', [App\Http\Controllers\Web\About::class, 'company_profile'])->name('about-company-profile');
Route::get('mission-vision-value', [App\Http\Controllers\Web\About::class, 'mvv'])->name('mission-vision-value');
Route::get('company-milestone', [App\Http\Controllers\Web\About::class, 'milestone'])->name('company-milestone');
Route::get('board-of-commissioners', [App\Http\Controllers\Web\About::class, 'commissioners'])->name('commissioners');
Route::get('board-of-directors', [App\Http\Controllers\Web\About::class, 'directors'])->name('directors');
Route::get('board-of-management', [App\Http\Controllers\Web\About::class, 'management'])->name('management');
Route::get('awards-certification', [App\Http\Controllers\Web\About::class, 'awards'])->name('awards');

// Backend
Auth::routes(['register' => false]);
Route::get('dashboard', [App\Http\Controllers\Administrator\Dashboard::class, 'index'])->name('dashboard');
Route::get('user_logs', [App\Http\Controllers\Administrator\UserLogs::class, 'index'])->name('user_logs');
Route::post('summernote', [App\Http\Controllers\Administrator\Summernote::class, 'upload']);
Route::resource('users', App\Http\Controllers\Administrator\Users::class);
Route::resource('sliders', App\Http\Controllers\Administrator\Sliders::class);

// File Manager
Route::get('files', [App\Http\Controllers\Administrator\Files::class, 'index'])->name('files.index');
Route::get('files_all', [App\Http\Controllers\Administrator\Files::class, 'all'])->name('files.all');
Route::post('files', [App\Http\Controllers\Administrator\Files::class, 'store'])->name('files.store');
Route::delete('files/{id}', [App\Http\Controllers\Administrator\Files::class, 'destroy'])->name('files.destroy');

// Website Profile
Route::get('website', [App\Http\Controllers\Administrator\Website::class, 'index'])->name('website.index');
Route::post('website', [App\Http\Controllers\Administrator\Website::class, 'store'])->name('website.store');
Route::put('website/{key}', [App\Http\Controllers\Administrator\Website::class, 'update'])->name('website.update');

// Company Profile
Route::get('company-profile', [App\Http\Controllers\Administrator\CompanyProfile::class, 'index'])->name('company-profile.index');
Route::post('company-profile', [App\Http\Controllers\Administrator\CompanyProfile::class, 'store'])->name('company-profile.store');
Route::put('company-profile/{key}', [App\Http\Controllers\Administrator\CompanyProfile::class, 'update'])->name('company-profile.update');

// Mission, Vision, Value
Route::get('mvv', [App\Http\Controllers\Administrator\MVV::class, 'index'])->name('mvv.index');
Route::post('mvv', [App\Http\Controllers\Administrator\MVV::class, 'store'])->name('mvv.store');
Route::put('mvv/{key}', [App\Http\Controllers\Administrator\MVV::class, 'update'])->name('mvv.update');

// Milestones
Route::resource('milestones', App\Http\Controllers\Administrator\Milestones::class);

// Executives
Route::resource('executives', App\Http\Controllers\Administrator\Executives::class);

// Awards and Certification
Route::resource('awards', App\Http\Controllers\Administrator\Awards::class);

// Press Release
Route::resource('blogs', App\Http\Controllers\Administrator\Blogs::class);
