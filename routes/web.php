<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserController;

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


// Routes cho quản lý người (countries)
Route::get('/', [CountryController::class, 'index'])->name('countries.index');
Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
Route::get('/countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
Route::put('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

// Routes cho quản lý người (persons)
Route::get('/persons', [PersonController::class, 'index'])->name('persons.index');
Route::get('/persons/create', [PersonController::class, 'create'])->name('persons.create');
Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');
Route::get('/persons/{person}/edit', [PersonController::class, 'edit'])->name('persons.edit');
Route::put('/persons/{person}', [PersonController::class, 'update'])->name('persons.update');
Route::delete('/persons/{person}', [PersonController::class, 'destroy'])->name('persons.destroy');

// Routes cho quản lý người dùng (users)
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes cho quản lý cônng ty (Company)
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');