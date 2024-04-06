<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\SeaServiceTestimonialController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeaServiceTestimonialPdf;
use App\Http\Controllers\RankController;
 
Route::get('/', [LoginController::class, 'login']);

Route::get('/Vessels', [VesselController::class, 'index'])->name('Vessels');
Route::get('/Add/Vessel', [VesselController::class, 'create'])->name('AddVessel');
Route::get('/Edit/Vessel/{Id}', [VesselController::class, 'update'])->name('EditVessel');
Route::get('/Delete/Vessel/{Id}', [VesselController::class, 'destroy'])->name('DeleteVessel');

Route::get('/Testimonials', [SeaServiceTestimonialController::class, 'index'])->name('Testimonials');
Route::get('/Add/Testimonial', [SeaServiceTestimonialController::class, 'create'])->name('AddTestimonial');
Route::get('/Edit/Testimonial/{Id}', [SeaServiceTestimonialController::class, 'update'])->name('EditTestimonial');
Route::get('/Delete/Testimonial/{Id}', [SeaServiceTestimonialController::class, 'destroy'])->name('DeleteTestimonial');

Route::get('/Operations', [VesselController::class, 'operations'])->name('Operations');

Route::get('/Notifications', [SeaServiceTestimonialController::class, 'notifications'])->name('Notifications');

Route::get('/Employees', [EmployeeController::class, 'index'])->name('Employees');
Route::get('/Add/Employee', [EmployeeController::class, 'create'])->name('AddEmployee');
Route::get('/Edit/Employee/{Id}', [EmployeeController::class, 'update'])->name('EditEmployee');
Route::get('/Delete/Employee/{Id}', [EmployeeController::class, 'destroy'])->name('DeleteEmployee');
 
Route::get('/Add/Rank', [RankController::class, 'create'])->name('AddRank');
Route::get('/Edit/Rank/{Id}', [RankController::class, 'update'])->name('EditRank');
Route::get('/Delete/Rank/{Id}', [RankController::class, 'destroy'])->name('DeleteRank');

Route::get('/Users', [UserController::class, 'index'])->name('Users');
Route::get('/Add/User', [UserController::class, 'create'])->name('AddUser');
Route::get('/Edit/User/{Id}', [UserController::class, 'update'])->name('EditUser');
Route::get('/Delete/User/{Id}', [UserController::class, 'destroy'])->name('DeleteUser');

Route::get('/DeckRating', [EmployeeController::class, 'deck_rating'])->name('DeckRating');
Route::get('/Engineers', [EmployeeController::class, 'engineers'])->name('Engineers');
Route::get('/Captains', [EmployeeController::class, 'captains'])->name('Captains');

// PDF 
Route::get('/Testimonials/Template/1', [SeaServiceTestimonialPdf::class, 'template_1'])->name('template_1');
Route::get('/Testimonials/Template/2', [SeaServiceTestimonialPdf::class, 'template_2'])->name('template_2');
Route::get('/Testimonials/Template/3', [SeaServiceTestimonialPdf::class, 'template_3'])->name('template_3');
Route::get('/Testimonials/Template/4', [SeaServiceTestimonialPdf::class, 'test']);
