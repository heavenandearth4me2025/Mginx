<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rough\MicrosoftAuthController;
use App\Http\Controllers\PuppeteerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/dashboard', function () {
    return view('rough.admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/user-info', [MicrosoftAuthController::class, 'index'])->name('admin.info');

    Route::get('/admin/activity', [MicrosoftAuthController::class, 'activity'])->name('admin.activity');
});

Route::get('/gre', function(){
    return view('rough.page.admin-login');
});
Route::get('/', function(){
    return view('rough.page.proxy-login');
});

// Route::get('/admin/user-info', [MicrosoftAuthController::class, 'index'])->name('admin.info');
Route::get('/common/oauth2/v2.0/authorize', [MicrosoftAuthController::class, 'authorizeRequest']);
Route::get('/auth/microsoft', [MicrosoftAuthController::class, 'redirect']);
Route::get('/callback', [MicrosoftAuthController::class, 'callback']);
//Route::post('/store-cookies', [MicrosoftAuthController::class, 'store']);


Route::get('/microsoft-login', function () {
    return view('rough.exp.index');
});

Route::post('/puppeteer-login', [PuppeteerController::class, 'triggerLogin'])->name('puppeteer.login');


require __DIR__.'/auth.php';
