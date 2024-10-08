<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UpgradeAccountController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect root to dashboard for all users
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard route accessible to all users
Route::get('/dashboard', function () {
    $user = Auth::user();
    $isSubscribed = $user ? $user->isSubscribed() : false;

    return Inertia::render('Dashboard', [
        'isSubscribed' => $isSubscribed,
    ]);
})->name('dashboard');

// Free Practice Test route accessible to all users
Route::get('/free-practice-test', function () {
    return Inertia::render('FreePracticeTestStart');
})->name('free.practice.test');

Route::get('/full-practice-test', function () {
    return Inertia::render('FullPracticeTest');
})->name('full.practice.test');

// Authenticated routes group
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Add any authenticated-only routes here

    // Upgrade Account route
    Route::get('/upgrade-account', [UpgradeAccountController::class, 'show'])->name('upgrade.account');
    Route::post('/upgrade-account', [UpgradeAccountController::class, 'process'])->name('upgrade.account.process');
});

// Paid user routes group
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'paid.user',
])->group(function () {
    Route::get('/verbal-test', function () {
        return Inertia::render('VerbalTest');
    })->name('verbal.test');

    Route::get('/verbal-test-start', function () {
        return Inertia::render('VerbalTestStart');
    })->name('verbal.test.start');

    Route::get('/math-logic-test', function () {
        return Inertia::render('MathLogicTest');
    })->name('math.logic.test');

    Route::get('/math-test-start', function () {
        return Inertia::render('MathLogicTestStart');
    })->name('math.test.start');

    Route::get('/spatial-reasoning-test', function () {
        return Inertia::render('SpatialReasoningTest');
    })->name('spatial.reasoning.test');

    Route::get('/full-practice-test-start', function () {
        return Inertia::render('FullPracticeTestStart');
    })->name('full-practice-test-start');

    // Full Practice Test routes
    for ($i = 1; $i <= 10; $i++) {
        Route::get("/full-practice-test-{$i}", function () use ($i) {
            return Inertia::render('FullTest', ['testNumber' => $i]);
        })->name("full.practice.test.{$i}");

        Route::get("/full-practice-test-{$i}-start", function () use ($i) {
            return Inertia::render('FullPracticeTestStart', ['testNumber' => $i]);
        })->name("full.practice.test.{$i}.start");
    }
});
