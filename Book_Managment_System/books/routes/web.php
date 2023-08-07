<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

Route::get('/books',[BooksController::class,'index'])->name('books.index');


Route::get('/books/create',[BooksController::class,'create'])->name('books.create');

Route::post('/books',[BooksController::class,'store'])->name('books.store');

Route::get('/books/{book}/edit',[BooksController::class,'edit'])->name('books.edit');

Route::put('/books/{book}',[BooksController::class,'update'])->name('books.update');

Route::delete('/books/{book}',[BooksController::class,'destroy'])->name('books.destroy');

