<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/service/{id}', [PublicController::class, 'serviceTemp'])->name('service.temp');
Route::get('/search', [PublicController::class, 'search'])->name('search');

//Категории
Route::get('/stroitelstvo_i_remont', [PublicController::class, 'stroitelstvo_i_remont'])->name('stroitelstvo_i_remont');
Route::get('/santehniki', [PublicController::class, 'santehniki'])->name('santehniki');
Route::get('/elektriki', [PublicController::class, 'elektriki'])->name('elektriki');
Route::get('/remont_ustanovka_tehniki', [PublicController::class, 'remont_ustanovka_tehniki'])->name('remont_ustanovka_tehniki');
Route::get('/gruzchiki', [PublicController::class, 'gruzchiki'])->name('gruzchiki');
Route::get('/spectehnika', [PublicController::class, 'spectehnika'])->name('spectehnika');
Route::get('/transportirovka', [PublicController::class, 'transportirovka'])->name('transportirovka');
Route::get('/avtoservis', [PublicController::class, 'avtoservis'])->name('avtoservis');
Route::get('/buhgalteriya_i_finansy', [PublicController::class, 'buhgalteriya_i_finansy'])->name('buhgalteriya_i_finansy');
Route::get('/detskie_sady_nyani_sidelki', [PublicController::class, 'detskie_sady_nyani_sidelki'])->name('detskie_sady_nyani_sidelki');
Route::get('/krasota_i_zdorove', [PublicController::class, 'krasota_i_zdorove'])->name('krasota_i_zdorove');
Route::get('/kursy_seminary_treningi', [PublicController::class, 'kursy_seminary_treningi'])->name('kursy_seminary_treningi');
Route::get('/master_na_chas', [PublicController::class, 'master_na_chas'])->name('master_na_chas');
Route::get('/mebel_remont_i_izgotovlenie', [PublicController::class, 'mebel_remont_i_izgotovlenie'])->name('mebel_remont_i_izgotovlenie');
Route::get('/obuchenie_repetitorstvo', [PublicController::class, 'obuchenie_repetitorstvo'])->name('obuchenie_repetitorstvo');
Route::get('/poshiv_remont_odezhdy_obuvi', [PublicController::class, 'poshiv_remont_odezhdy_obuvi'])->name('poshiv_remont_odezhdy_obuvi');
Route::get('/prazdniki_i_meropriyatiya', [PublicController::class, 'prazdniki_i_meropriyatiya'])->name('prazdniki_i_meropriyatiya');
Route::get('/rabota_s_tekstom_perevody', [PublicController::class, 'rabota_s_tekstom_perevody'])->name('rabota_s_tekstom_perevody');
Route::get('/reklama_i_poligrafiya', [PublicController::class, 'reklama_i_poligrafiya'])->name('reklama_i_poligrafiya');
Route::get('/remont_komputerov_mobilnyh_ustroistv', [PublicController::class, 'remont_komputerov_mobilnyh_ustroistv'])->name('remont_komputerov_mobilnyh_ustroistv');
Route::get('/slesari', [PublicController::class, 'slesari'])->name('slesari');
Route::get('/sozdanie_saitov_podderzhka_po', [PublicController::class, 'sozdanie_saitov_podderzhka_po'])->name('sozdanie_saitov_podderzhka_po');
Route::get('/uborka_pomeshenii_territorii', [PublicController::class, 'uborka_pomeshenii_territorii'])->name('uborka_pomeshenii_territorii');
Route::get('/foto_i_videosemka', [PublicController::class, 'foto_i_videosemka'])->name('foto_i_videosemka');
Route::get('/uridicheskie_uslugi', [PublicController::class, 'uridicheskie_uslugi'])->name('uridicheskie_uslugi');
Route::get('/drugoe', [PublicController::class, 'drugoe'])->name('drugoe');

//auth
Route::get('/auth/register', [AuthController::class, 'registerPage'])->middleware('guest')->name('register');
Route::post('/auth/register', [AuthController::class, 'registerStore'])->middleware('guest');

Route::get('/profile', [AuthController::class, 'lkPage'])->middleware('auth')->name('lk');
Route::get('/auth/edit', [AuthController::class, 'lkEditPage'])->middleware('auth')->name('lk.edit');
Route::post('/auth/edit', [AuthController::class, 'lkEditStore'])->middleware('auth')->name('lk.edit');

Route::get('/auth/login', [AuthController::class, 'loginPage'])->middleware('guest')->name('login');
Route::post('/auth/login', [AuthController::class, 'loginStore'])->middleware('guest');

Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/auth/forgot-password', [AuthController::class, 'forgotPasswordPage'])->middleware('guest')->name('password.request');
Route::post('/auth/forgot-password', [AuthController::class, 'forgotPasswordStore'])->middleware('guest')->name('password.email');

Route::get('/auth/reset-password', [AuthController::class, 'resetPasswordPage'])->middleware('guest')->name('password.reset');
Route::post('/auth/reset-password', [AuthController::class, 'resetPasswordStore'])->middleware('guest')->name('password.update');

//admin
Route::get('/admin/all', [AdminController::class, 'adminAllPage'])->middleware('auth')->name('admin.all');
Route::get('/admin/add', [AdminController::class, 'adminAddPage'])->middleware('auth')->name('admin.add');
Route::post('/admin/add', [AdminController::class, 'adminAddStore'])->middleware('auth');
Route::get('/admin/edit/{id}', [AdminController::class, 'adminEditPage'])->middleware('auth')->name('admin.edit');
Route::post('/admin/edit/{id}', [AdminController::class, 'adminEditStore'])->name('admin.edit')->middleware('auth');
Route::post('/admin/remove', [AdminController::class, 'adminRemove'])->name('admin.remove')->middleware('auth');