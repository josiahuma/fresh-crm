<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SmsTemplateController;
use App\Http\Controllers\HomeController;

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Member routes
Route::resource('members', MemberController::class)->middleware('auth');
Route::post('members/send-sms', [MemberController::class, 'sendSms'])->name('members.sendSms')->middleware('auth');
Route::post('/members/bulk-sms', [MemberController::class, 'sendBulkSms'])->name('members.bulkSms')->middleware('auth');
Route::post('members/import', [MemberController::class, 'import'])->name('members.import')->middleware('auth');
Route::get('members/{id}/profile', [MemberController::class, 'profile'])->name('members.profile')->middleware('auth');

// Attendance routes
Route::resource('attendances', AttendanceController::class)->middleware('auth');

// Finance routes
Route::resource('finances', FinanceController::class)->middleware('auth');
Route::post('finances/store-income', [FinanceController::class, 'storeIncome'])->name('finances.storeIncome');
Route::post('finances/store-expense', [FinanceController::class, 'storeExpense'])->name('finances.storeExpense');

// SMS Template routes
Route::resource('sms_templates', SmsTemplateController::class)->middleware('auth');

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');