<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {


    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('auth/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register-store');

    Route::post('category.store', [CategoryController::class, 'storeCategory'])->name('category-store');
    Route::post('subcategory.store', [AdminController::class, 'storeSubcategory'])->name('subcategory-store');

    // *ARCHIVE SELECT ID WHETHER IT IS USER OR CATEGORY
    Route::post('archive/{id}', [RegisteredUserController::class, 'archive'])->name('archive');
    Route::post('unarchive/{id}', [RegisteredUserController::class, 'unarchive'])->name('unarchive');


    //

    // *USER ARCHIVE
    Route::post('archive', [RegisteredUserController::class, 'archiveGroup'])->name('archiveGroup');
    Route::post('unarchive', [RegisteredUserController::class, 'unarchiveGroup'])->name('unarchiveGroup');


    // *CATEGORY ARCHIVE
    Route::post('archiveCategoryGroup',[CategoryController::class, 'archiveCategoryGroup'])->name('archiveCategoryGroup');
    Route::post('unarchiveCategoryGroup', [CategoryController::class, 'unarchiveCategoryGroup'])->name('unarchiveCategoryGroup');


    Route::put('update/{id}', [RegisteredUserController::class, 'update'])->name('update-store');
    Route::put('category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category-update');
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

