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
use App\Http\Controllers\SpeedBoatsPdf;
use App\Http\Controllers\SmallBoatsPdf;
use App\Http\Controllers\Checklist1Controller;
 
Route::get('/', [LoginController::class, 'login']);
Route::post('/Auth', [LoginController::class, 'auth'])->name('Auth');
Route::get('/Logout', [LoginController::class, 'logout'])->name('Logout');

Route::get('/Vessels', [VesselController::class, 'index'])->name('Vessels');
Route::post('/Add/Vessel', [VesselController::class, 'create'])->name('AddVessel');
Route::post('/Edit/Vessel/{Id?}', [VesselController::class, 'update'])->name('EditVessel');
Route::get('/Delete/Vessel/{Id}', [VesselController::class, 'destroy'])->name('DeleteVessel');

Route::get('/Availability', [VesselAvailabilityController::class, 'index'])->name('Availability');
Route::post('/Add/Availability', [PriorityExcelImportController::class, 'import'])->name('AddAvailability');
// Route::post('/Add/Availability', [VesselAvailabilityController::class, 'store'])->name('AddAvailability');
Route::post('/Edit/Availability/{Id}', [VesselAvailabilityController::class, 'update'])->name('EditAvailability');
Route::get('/Delete/Availability/{Id}', [VesselAvailabilityController::class, 'destroy'])->name('DeleteAvailability');

Route::get('/Testimonials', [SeaServiceTestimonialController::class, 'index'])->name('Testimonials');
Route::post('/Add/Testimonial', [SeaServiceTestimonialController::class, 'create'])->name('AddTestimonial');
Route::post('/Edit/Testimonial/{Id}', [SeaServiceTestimonialController::class, 'update'])->name('EditTestimonial');
Route::get('/Delete/Testimonial/{Id}', [SeaServiceTestimonialController::class, 'destroy'])->name('DeleteTestimonial');

Route::get('/Operations', [VesselController::class, 'operations'])->name('Operations');

Route::get('/Notifications', [SeaServiceTestimonialController::class, 'notifications'])->name('Notifications');

Route::get('/Employees', [EmployeeController::class, 'index'])->name('Employees');
Route::post('/Add/Employee', [EmployeeController::class, 'create'])->name('AddEmployee');
Route::post('/Edit/Employee/{Id}', [EmployeeController::class, 'update'])->name('EditEmployee');
Route::get('/Delete/Employee/{Id}', [EmployeeController::class, 'destroy'])->name('DeleteEmployee');
 
Route::post('/Add/Rank', [RankController::class, 'create'])->name('AddRank');
Route::post('/Edit/Rank/{Id}', [RankController::class, 'update'])->name('EditRank');
Route::get('/Delete/Rank/{Id}', [RankController::class, 'destroy'])->name('DeleteRank');

Route::post('/Add/Company', [CompanyController::class, 'create'])->name('AddCompany');
Route::post('/Edit/Company/{Id}', [CompanyController::class, 'update'])->name('EditCompany');
Route::get('/Delete/Company/{Id}', [CompanyController::class, 'destroy'])->name('DeleteCompany');

Route::get('/Users', [UserController::class, 'index'])->name('Users');
Route::post('/Add/User', [UserController::class, 'create'])->name('AddUser');
Route::post('/Edit/User/{Id}', [UserController::class, 'update'])->name('EditUser');
Route::get('/Delete/User/{Id}', [UserController::class, 'destroy'])->name('DeleteUser');

Route::get('/DeckRating', [EmployeeController::class, 'deck_rating'])->name('DeckRating');
Route::get('/Engineers', [EmployeeController::class, 'engineers'])->name('Engineers');
Route::get('/Captains', [EmployeeController::class, 'captains'])->name('Captains');

// PDF 
Route::get('/Testimonials/Template/1', [SeaServiceTestimonialPdf::class, 'template_1'])->name('template_1');
Route::get('/Testimonials/Template/2', [SeaServiceTestimonialPdf::class, 'template_2'])->name('template_2');
Route::get('/Testimonials/Template/3', [SeaServiceTestimonialPdf::class, 'template_3'])->name('template_3');
Route::get('/Testimonials/Template/4', [SeaServiceTestimonialPdf::class, 'template_4'])->name('template_4');
Route::get('/Testimonials/Template/5', [SeaServiceTestimonialPdf::class, 'template_5'])->name('template_5');
Route::get('/Testimonials/Template/1_', [SeaServiceTestimonialPdf::class, 'template_1_'])->name('template_1_');
Route::get('/Testimonials/Template/2_', [SeaServiceTestimonialPdf::class, 'template_2_'])->name('template_2_');
Route::get('/Testimonials/Template/3_', [SeaServiceTestimonialPdf::class, 'template_3_'])->name('template_3_');
Route::get('/Testimonials/Template/4_', [SeaServiceTestimonialPdf::class, 'template_4_'])->name('template_4_');
Route::get('/Testimonials/Template/5_', [SeaServiceTestimonialPdf::class, 'template_5_'])->name('template_5_');

Route::get('/Availability/Report', [VesselAvailabilityPdf::class, 'vessel_availability_report'])->name('vessel_availability_report');

Route::post('/Add/Checklist1', [Checklist1Controller::class, 'create'])->name('AddChecklist1');
Route::post('/Edit/Checklist1/{Id}', [Checklist1Controller::class, 'update'])->name('EditChecklist1');
Route::get('/Delete/Checklist1/{Id}', [Checklist1Controller::class, 'destroy'])->name('DeleteChecklist1');

Route::get('/Availability/Report/Checklists/SpeedBoats', [SpeedBoatsPdf::class, 'speed_boat_report'])->name('speed_boat_report');
Route::get('/Availability/Report/Checklists/SmallBoats', [SmallBoatsPdf::class, 'small_boat_report'])->name('speed_boat_report');