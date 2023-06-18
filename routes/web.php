<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

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



Route::get('pet/show', [PetController::class, 'show'])->name('pet.show');
Route::get('pet/create', [PetController::class, 'create'])->name('pet.create');
Route::get('pet/edit', [PetController::class, 'edit'])->name('pet.edit');
Route::post('pet/store', [PetController::class, 'store'])->name('pet.store');
Route::post('pet/{id}/update', [PetController::class, 'update'])->name('pet.update');
Route::post('pet/{id}/data', [PetController::class, 'getPetDataById'])->name('pet.getPetDataById');
