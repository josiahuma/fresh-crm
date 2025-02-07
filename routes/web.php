<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SmsTemplateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('members', MemberController::class)->middleware('auth');
Route::post('members/send-sms', [MemberController::class, 'sendSms'])->name('members.sendSms')->middleware('auth');

Route::resource('attendances', AttendanceController::class)->middleware('auth');
Route::resource('finances', FinanceController::class)->middleware('auth');
Route::resource('sms_templates', SmsTemplateController::class)->middleware('auth');
Route::post('/members/import', [MemberController::class, 'import'])->name('members.import');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
