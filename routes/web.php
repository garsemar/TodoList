<?php

use App\Http\Controllers\todosController;
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

Route::get('/todo', function () {
    return view('todo.index');
})->name('todo');

Route::post('/todo', [TodosController::class, 'store'])->name('todo');

Route::get('/todo', [TodosController::class, 'index'])->name('todo');

Route::get('/todo/{id}', [TodosController::class, 'show'])->name('todo-show');
Route::patch('/todo/{id}', [TodosController::class, 'update'])->name('todo-update');

Route::delete('/todo', [TodosController::class, 'destroy'])->name('todo-destroy');

Route::get('/hola', function () {
    return response()->view('errors.404', [], 404);
});