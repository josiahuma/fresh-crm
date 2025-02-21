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
    Route::get('/create', [MemberController::class, 'create'])->name('create');
    Route::post('members/send-sms', [MemberController::class, 'sendSms'])->name('members.sendSms');
    Route::post('/members/bulk-sms', [MemberController::class, 'sendBulkSms'])->name('members.bulkSms');
    Route::post('members/import', [MemberController::class, 'import'])->name('members.import');
    Route::get('members/{id}/profile', [MemberController::class, 'profile'])->name('members.profile');
    Route::get('unit/categories/create', [MemberController::class, 'createChurchUnitCategory'])->name('church_unit_categories.create');
    Route::post('unit/categories/store', [MemberController::class, 'storeChurchUnitCategory'])->name('church_unit_categories.store');
});

// Attendance routes
Route::middleware(['auth'])->group(function () {
    Route::resource('attendances', AttendanceController::class);
    Route::get('/event/create', [AttendanceController::class, 'create'])->name('eventcreate');
    Route::get('event/categories/create', [AttendanceController::class, 'createEventCategory'])->name('event_categories.create');
    Route::post('event/categories/store', [AttendanceController::class, 'storeEventCategory'])->name('event_categories.store');
});

// Finance routes
Route::middleware(['auth'])->group(function () {
    Route::resource('finances', FinanceController::class);
    Route::get('/create', [FinanceController::class, 'create'])->name('create');
    Route::post('finances/store-income', [FinanceController::class, 'storeIncome'])->name('finances.storeIncome');
    Route::post('finances/store-expense', [FinanceController::class, 'storeExpense'])->name('finances.storeExpense');
    Route::get('income/categories/create', [FinanceController::class, 'createIncomeCategory'])->name('income_categories.create');
    Route::post('income/categories/store', [FinanceController::class, 'storeIncomeCategory'])->name('income_categories.store');
    Route::get('expense/categories/create', [FinanceController::class, 'createExpenseCategory'])->name('expense_categories.create');
    Route::post('expense/categories/store', [FinanceController::class, 'storeExpenseCategory'])->name('expense_categories.store');
});

// SMS Template routes
Route::middleware(['auth'])->group(function () {
    Route::resource('sms_templates', SmsTemplateController::class);
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');