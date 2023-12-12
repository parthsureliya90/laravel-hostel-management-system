<?php

use Illuminate\Support\Facades\Route;
// use Artisan;

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/authlogin', [App\Http\Controllers\Auth\LoginController::class, 'authlogin'])->name('authlogin');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashBoardController::class, 'dashboard'])->name('dashboard');
Route::get('/masterdata', [App\Http\Controllers\MasterController::class, 'masterdata'])->name('masterdata');


Route::get('/expences/{date_from?}/{date_to?}', [App\Http\Controllers\ExpencesController::class, 'index'])->name('expences');
Route::get('/create-expences/', [App\Http\Controllers\ExpencesController::class, 'create'])->name('expence_create');
Route::get('/destroy-expences/{id}', [App\Http\Controllers\ExpencesController::class, 'destroy'])->name('destroy_expence');
Route::post('/save-expences/', [App\Http\Controllers\ExpencesController::class, 'store'])->name('expence_save');

Route::get('/feespay/{id}/{type?}', [App\Http\Controllers\FeesRegisterController::class, 'fees_pay'])->name('fees_pay');
Route::post('/feespay', [App\Http\Controllers\FeesRegisterController::class, 'save_fees_pay'])->name('save_fees_pay');
Route::get('/print-recipt/{sid}/{frid}/{firm}', [App\Http\Controllers\FeesController::class, 'print_recipt'])->name('print_recipt');
Route::get('/fees-bank-verified/{id}/{type}', [App\Http\Controllers\FeesRegisterController::class, 'bank_verified'])->name('bank_verified');
Route::get('/remove-fees/{id}/{sid}', [App\Http\Controllers\FeesRegisterController::class, 'remove_fees'])->name('remove_fees');
Route::get('/fees-date-report/{date_from?}/{date_to?}', [App\Http\Controllers\FeesReportController::class, 'fees_report'])->name('fees_report');
Route::get('/fees-pending/', [App\Http\Controllers\FeesReportController::class, 'fees_pending'])->name('fees_pending');
Route::get('/fees-register-by-student/{sid}', [App\Http\Controllers\FeesReportController::class, 'fees_register_by_student'])->name('fees_register_by_student');



Route::get('/attendance', [App\Http\Controllers\AttendanceController::class, 'attendance'])->name('attendance');
Route::post('/create-attendance', [App\Http\Controllers\AttendanceController::class, 'create_attendance'])->name('create_attendance');
Route::get('/edit-attendance', [App\Http\Controllers\AttendanceController::class, 'edit_attandance'])->name('edit_attandance');
Route::get('/view-attendance', [App\Http\Controllers\AttendanceController::class, 'view_attendance'])->name('view_attendance');
Route::get('/print-attendance', [App\Http\Controllers\AttendanceController::class, 'print_attendance'])->name('print_attendance');
Route::post('/update-attandance', [App\Http\Controllers\AttendanceController::class, 'update_attandance'])->name('update_attandance');

Route::get('/batch', [App\Http\Controllers\BatchController::class, 'batch'])->name('batch');
Route::get('/add-batch', [App\Http\Controllers\BatchController::class, 'batch_add'])->name('add-batch');
Route::post('/save-batch', [App\Http\Controllers\BatchController::class, 'save_batch'])->name('save-batch');
Route::get('/edit-batch', [App\Http\Controllers\BatchController::class, 'batch_edit'])->name('edit-batch');
Route::post('/update-batch', [App\Http\Controllers\BatchController::class, 'update_batch'])->name('update-batch');

Route::get('/buildings', [App\Http\Controllers\BuildingsController::class, 'buildings'])->name('buildings');
Route::get('/add-buildings', [App\Http\Controllers\BuildingsController::class, 'buildings_add'])->name('add-buildings');
Route::post('/save-buildings', [App\Http\Controllers\BuildingsController::class, 'save_buildings'])->name('save-buildings');
Route::get('/status-buildings', [App\Http\Controllers\BuildingsController::class, 'status_buildings'])->name('status-buildings');
Route::get('/edit-buildings', [App\Http\Controllers\BuildingsController::class, 'buildings_edit'])->name('edit-buildings');
Route::post('/update-buildings', [App\Http\Controllers\BuildingsController::class, 'update_buildings'])->name('update-buildings');

Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'rooms'])->name('rooms');
Route::get('/add-rooms', [App\Http\Controllers\RoomController::class, 'rooms_add'])->name('add-rooms');
Route::post('/save-rooms', [App\Http\Controllers\RoomController::class, 'save_rooms'])->name('save-rooms');
Route::get('/status-rooms', [App\Http\Controllers\RoomController::class, 'status_rooms'])->name('status-rooms');
Route::get('/edit-rooms', [App\Http\Controllers\RoomController::class, 'rooms_edit'])->name('edit-rooms');
Route::post('/update-rooms', [App\Http\Controllers\RoomController::class, 'update_rooms'])->name('update-rooms');
Route::get('/students-by-rooms/{id}', [App\Http\Controllers\RoomController::class, 'studnets_by_rooms'])->name('students-by-rooms');
Route::get('/students-by-collage/{id}/{name}', [App\Http\Controllers\CollegeMaster::class, 'studnets_by_collage'])->name('students-by-collage');

Route::get('/college', [App\Http\Controllers\CollegeMaster::class, 'college'])->name('college');
Route::get('/add-college', [App\Http\Controllers\CollegeMaster::class, 'college_add'])->name('add-college');
Route::post('/save-college', [App\Http\Controllers\CollegeMaster::class, 'save_college'])->name('save-college');
Route::get('/status-college', [App\Http\Controllers\CollegeMaster::class, 'status_college'])->name('status-college');
Route::get('/edit-college', [App\Http\Controllers\CollegeMaster::class, 'college_edit'])->name('edit-college');
Route::post('/update-college', [App\Http\Controllers\CollegeMaster::class, 'update_college'])->name('update-college');

Route::get('/students', [App\Http\Controllers\StudentsController::class, 'students'])->name('students');
Route::get('/add-student', [App\Http\Controllers\StudentsController::class, 'students_add'])->name('add-student');
Route::post('/save-student', [App\Http\Controllers\StudentsController::class, 'save_student'])->name('save-student');
Route::get('/edit-student', [App\Http\Controllers\StudentsController::class, 'edit_student'])->name('edit-student');
Route::post('/update-student', [App\Http\Controllers\StudentsController::class, 'update_student'])->name('update-student');
Route::post('/search', [App\Http\Controllers\StudentsController::class, 'search'])->name('search');
Route::get('/student-id-card', [App\Http\Controllers\StudentsController::class, 'students_id_card'])->name('students_id_card');
Route::get('/print-id-card/{id}/{name}', [App\Http\Controllers\StudentsController::class, 'print_id_card'])->name('print_id_card');







Route::get('/change-password', [App\Http\Controllers\Auth\LoginController::class, 'change_password'])->name('change-password');



Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
