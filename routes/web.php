<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\TVShowsController;
use App\Http\Controllers\Payment\SingleChargeController;
use App\Http\Controllers\Payment\SubscriptionController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/movies',[MoviesController::class, 'index'])->name('movies.index');
//Show an specific movie
Route::get('/movies/{movie}',[MoviesController::class, 'show'])->name('movies.show');



Route::get('/actors',[ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page}',[ActorsController::class, 'index'])->name('actors.index');
//Show an specific movie
Route::get('/actors/{actor}',[ActorsController::class, 'show'])->name('actors.show');


//tv shows

Route::get('/TVShows',[TVShowsController::class, 'index'])->name('TVShows.index');
Route::get('/TVShows/{tv}',[TVShowsController::class, 'show'])->name('TVShows.show');


//payments

//singleCharge
Route::get('/singlePayment', [SingleChargeController::class, 'index'])->name('payments.singleCharge.index');
Route::get('/successfulPayment', [SingleChargeController::class, 'successfulPayment'])->name('payments.singleCharge.successfulPayment');
Route::post('single-charge', [SingleChargeController::class, 'singleCharge'])->name('single.charge');

//plans and subscriptions
Route::middleware('auth')->group(function () {
Route::get('plans/create', [SubscriptionController::class, 'showPlanForm'])->name('subscriptions.createPlan');
Route::post('plans/store', [SubscriptionController::class, 'savePlan'])->name('subscriptions.store');
});


Route::get('plans', [SubscriptionController::class, 'allPlans'])->name('subscriptions.allPlans');
Route::middleware('auth')->group(function () {
Route::get('plans/checkout/{planId}', [SubscriptionController::class, 'checkout'])->name('subscriptions.checkout');
Route::post('plans/process', [SubscriptionController::class, 'processPlan'])->name('subscriptions.process');
Route::get('subscriptions/all', [SubscriptionController::class, 'allSubscriptions'])->name('subscriptions.all');
});