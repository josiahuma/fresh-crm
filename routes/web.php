<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SmsTemplateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\FollowupsController;




Route::resource('leaders', LeaderController::class);
Route::get('/followups', [FollowupsController::class, 'index'])->name('followups.index');
Route::post('/followups', [FollowupsController::class, 'showMembers'])->name('followups.show');
Route::post('/followups/export', [LeaderController::class, 'exportMembers'])->name('followups.export');

// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Member routes
Route::middleware(['auth'])->group(function () {
    Route::resource('members', MemberController::class);
    Route::post('members/send-sms', [MemberController::class, 'sendSms'])->name('members.sendSms');
    Route::post('/members/bulk-sms', [MemberController::class, 'sendBulkSms'])->name('members.bulkSms');
    Route::post('members/import', [MemberController::class, 'import'])->name('members.import');
    Route::get('members/{id}/profile', [MemberController::class, 'profile'])->name('members.profile');
});

// Attendance routes
Route::middleware(['auth'])->group(function () {
    Route::resource('attendances', AttendanceController::class);
});

// Finance routes
Route::middleware(['auth'])->group(function () {
    Route::resource('finances', FinanceController::class);
    Route::post('finances/store-income', [FinanceController::class, 'storeIncome'])->name('finances.storeIncome');
    Route::post('finances/store-expense', [FinanceController::class, 'storeExpense'])->name('finances.storeExpense');
});

// SMS Template routes
Route::middleware(['auth'])->group(function () {
    Route::resource('sms_templates', SmsTemplateController::class);
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');