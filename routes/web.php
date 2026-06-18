<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinancialGoalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetLimitController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang/{locale}', function ($locale) {

    if (in_array($locale, ['lv', 'en'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }

    return redirect()->back();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('incomes', IncomeController::class);

    Route::resource('expenses', ExpenseController::class);

    Route::resource('financial-goals', FinancialGoalController::class);

    Route::resource('budget-limits', BudgetLimitController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
