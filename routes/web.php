<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\UserController;

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


// USUARIO
// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('users', [UserController::class, 'store'])->name('users.store');
// Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//Ruta limpia
Route::resource('users', UserController::class);



// GRADOS
Route::resource('degrees', DegreeController::class);


//MENSAJES
Route::resource('degrees', DegreeController::class);





// Route::controller(UserController::class)->group(function () {

//     Route::get('users', 'index')->name('users.index');

//     Route::get('users/create', 'create')->name('users.create');
// });




// Route::resource('users', UserController::class);
