<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\SeaServiceTestimonialController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
 
Route::get('/', [LoginController::class, 'login']);

Route::get('/Vessels', [VesselController::class, 'index'])->name('Vessels');

Route::get('/Testimonials', [SeaServiceTestimonialController::class, 'index'])->name('Testimonials');

Route::get('/Operations', [VesselController::class, 'operations'])->name('Operations');

Route::get('/Notifications', [SeaServiceTestimonialController::class, 'notifications'])->name('Notifications');

Route::get('/Employees', [EmployeeController::class, 'index'])->name('Employees');

Route::get('/Users', [UserController::class, 'index'])->name('Users');

Route::get('/DeckRating', [EmployeeController::class, 'deck_rating'])->name('DeckRating');
Route::get('/Engineers', [EmployeeController::class, 'engineers'])->name('Engineers');
Route::get('/Captains', [EmployeeController::class, 'captains'])->name('Captains');
