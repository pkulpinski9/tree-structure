<?php

use App\Http\Controllers\TreeController;
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

Route::get('dashboard', [TreeController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['admin']], function () {
    Route::get('node_add', [TreeController::class, 'index2'])->name('node_add');
    Route::post('node_add', [TreeController::class, 'store']);
    Route::get('node_delete', [TreeController::class, 'index3'])->name('node_delete');
    Route::delete('node_delete', [TreeController::class, 'destroy']);
    Route::get('node_edit', [TreeController::class, 'index4'])->name('node_edit');
    Route::post('node_edit', [TreeController::class, 'update']);
});
require __DIR__.'/auth.php';
