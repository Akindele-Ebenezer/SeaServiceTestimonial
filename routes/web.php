<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\SeaServiceTestimonialController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeaServiceTestimonialPdf;
use App\Http\Controllers\RankController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VesselAvailabilityController;
use App\Http\Controllers\PriorityExcelImportController;
use App\Http\Controllers\VesselAvailabilityPdf;
 
Route::get('/', [LoginController::class, 'login']);
Route::get('/Auth', [LoginController::class, 'auth'])->name('Auth');
Route::get('/Logout', [LoginController::class, 'logout'])->name('Logout');

Route::get('/Vessels', [VesselController::class, 'index'])->name('Vessels');
Route::get('/Add/Vessel', [VesselController::class, 'create'])->name('AddVessel');
Route::get('/Edit/Vessel/{Id?}', [VesselController::class, 'update'])->name('EditVessel');
Route::get('/Delete/Vessel/{Id}', [VesselController::class, 'destroy'])->name('DeleteVessel');

Route::get('/Availability', [VesselAvailabilityController::class, 'index'])->name('Availability');
Route::post('/Add/Availability', [PriorityExcelImportController::class, 'import'])->name('AddAvailability');
// Route::post('/Add/Availability', [VesselAvailabilityController::class, 'store'])->name('AddAvailability');
Route::post('/Edit/Availability/{Id}', [VesselAvailabilityController::class, 'update'])->name('EditAvailability');
Route::get('/Delete/Availability/{Id}', [VesselAvailabilityController::class, 'destroy'])->name('DeleteAvailability');

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

Route::get('/Add/Company', [CompanyController::class, 'create'])->name('AddCompany');
Route::get('/Edit/Company/{Id}', [CompanyController::class, 'update'])->name('EditCompany');
Route::get('/Delete/Company/{Id}', [CompanyController::class, 'destroy'])->name('DeleteCompany');

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
Route::get('/Testimonials/Template/4', [SeaServiceTestimonialPdf::class, 'template_4'])->name('template_4');
Route::get('/Testimonials/Template/1_', [SeaServiceTestimonialPdf::class, 'template_1_'])->name('template_1_');
Route::get('/Testimonials/Template/2_', [SeaServiceTestimonialPdf::class, 'template_2_'])->name('template_2_');
Route::get('/Testimonials/Template/3_', [SeaServiceTestimonialPdf::class, 'template_3_'])->name('template_3_');
Route::get('/Testimonials/Template/4_', [SeaServiceTestimonialPdf::class, 'template_4_'])->name('template_4_');

Route::get('/Availability/Report', [VesselAvailabilityPdf::class, 'vessel_availability_report'])->name('vessel_availability_report');
