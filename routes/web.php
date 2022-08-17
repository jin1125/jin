<?php

use App\Http\Controllers\StudyController;
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

Route::inertia('/', 'Profile')
    ->name('profile');

Route::prefix('study')
    ->controller(StudyController::class)
    ->name('study')
    ->group(function () {
    Route::get('/', 'showStudy');
});

require __DIR__.'/auth.php';
