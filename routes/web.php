<?php

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
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DeviceController;

Route::get('/', [OrganizationController::class, 'index'])->name('organizations.index');
Route::post('/organizations/store', [OrganizationController::class, 'store'])->name('organizations.store');
Route::get('/organizations/create', [OrganizationController::class, 'create'])->name('organizations.create');
Route::post('/locations/store', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
Route::post('/devices/store', [DeviceController::class, 'store'])->name('devices.store');
Route::get('/devices/create', [DeviceController::class, 'create'])->name('devices.create');
