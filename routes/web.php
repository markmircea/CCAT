<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Dashboard');
})->name('dashboard');

// Authenticated routes group
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Add any authenticated-only routes here
});

// Paid user routes group
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'paid.user', // This middleware needs to be created
])->group(function () {
    Route::get('/verbal-test', function () {
        return Inertia::render('VerbalTest');
    })->name('verbal.test');

    Route::get('/math-logic-test', function () {
        return Inertia::render('MathLogicTest');
    })->name('math.logic.test');

    Route::get('/spatial-reasoning-test', function () {
        return Inertia::render('SpatialReasoningTest');
    })->name('spatial.reasoning.test');

    Route::get('/full-practice-test', function () {
        return Inertia::render('FullPracticeTest');
    })->name('full.practice.test');
});
