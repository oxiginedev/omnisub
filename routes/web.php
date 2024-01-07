<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Webhooks\MonnifyWebhookController;
use App\Http\Controllers\Webhooks\PaystackWebhookController;
use App\Http\Livewire\Dashboard;
use App\Http\Middleware\ValidateMonnifySignature;
use App\Http\Middleware\ValidatePaystackSignature;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});

Route::middleware('guest')->group(function (): void {
    Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function (): void {
    Route::get('/email/verify', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('/email/verification-notication', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

Route::prefix('webhooks')->group(function (): void {
    Route::post('/paystack', PaystackWebhookController::class)
        ->middleware(ValidatePaystackSignature::class)
        ->name('webhook.paystack');

    Route::post('/monnify', MonnifyWebhookController::class)
        ->middleware(ValidateMonnifySignature::class)
        ->name('webhook.monnify');
});