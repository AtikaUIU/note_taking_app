<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
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
    //return view('welcome');
    return redirect('/note_taking_app');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'note_taking_app'], function (){

    Route::get('/', [NoteController::class, 'index'])->name('index');
    Route::get('/create', [NoteController::class, 'create'])->name('create');
    Route::post('/store', [NoteController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [NoteController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [NoteController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [NoteController::class, 'delete'])->name('delete');
    Route::get('/search', [NoteController::class, 'search'])->name('search');

    });
