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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\AdminMembershipController;
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

// EMPLOYEE ROUTES
Route::middleware(['auth', 'verified', 'employee'])->group(function(){

    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::get('order/membership', [MembershipController::class, 'membership'])->name('membership');

    Route::get('order/products/{id}', [OrderController::class, 'getProduct'])->name('getProduct');
    Route::get('order/all-products', [OrderController::class, 'allProducts'])->name('allProducts');
    Route::get('order/subcategory/products/{id}', [OrderController::class, 'getSubcategoryProduct'])->name('getSubcategoryProduct');
    Route::post('order/store', [OrderController::class, 'storeOrder'])->name('storeOrder');
    Route::post('product/item/{id}', [OrderController::class, 'getItem'])->name('getItem');
    // === request membership ===
    Route::post('request-membership', [MembershipController::class, 'storeMembership'])->name('storeMembership');
    
    // ===getting the membership id===
    Route::post('order/membership/{id}', [OrderController::class, 'getMembership'])->name('getMembership');	
    
});


Route::middleware(['auth', 'verified'])->group(function(){
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// ADMIN ROUTES
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('admin/overview', [AdminController::class, 'redirectOverview'])->name('overview');
  
    Route::get('admin/employee', [RegisteredUserController::class, 'create'])->name('employee');
    Route::get('admin/admin', [AdminController::class, 'redirectAdmin'])->name('admin');

    
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register-store');
    Route::get('admin/category', [CategoryController::class, 'redirectCategory'])->name('category');



    // Product Controller
    Route::get('admin/product', [ProductController::class, 'redirectProduct'])->name('product');


    // SUBCATEGORY ROUTE


    Route::get('admin/employee/{id}', [RegisteredUserController::class, 'getUser'])->name('getUser');

    //GET THE VALUE BY SPECIFIC ID
    Route::get('admin/category/{id}', [CategoryController::class, 'getCategory'])->name('getCategory');
    Route::get('admin/category/subcategory/{id}', [SubcategoryController::class, 'getSubcategory'])->name('getSubcategory');



    // *Category
    Route::get('admin/archive/archive-category', [CategoryController::class, 'archivedCategories'])->name('archive-category');

    Route::get('admin/archive/archive-employee', [RegisteredUserController::class, 'redirectArchiveEmployee'])->name('archive-employee');
    Route::get('admin/archive/archive-admin', [AdminController::class, 'redirectArchiveAdmin'])->name('archive-admin');

    Route::get('admin/archive/archive-product', [ProductController::class, 'redirectArchiveProduct'])->name('archive-product');

    Route::post('category.store', [CategoryController::class, 'storeCategory'])->name('category-store');
    Route::post('subcategory.store', [SubcategoryController::class, 'storeSubcategory'])->name('subcategory-store');


    // Product
    Route::post('product.store', [ProductController::class, 'storeProduct'])->name('product-store');
    Route::put('product/update/{id}', [ProductController::class, 'updateProduct'])->name('product-update');
    Route::post('product/archive/{id}', [ProductController::class, 'archiveProduct'])->name('archiveProduct');
    Route::post('product/unarchive/{id}', [ProductController::class, 'unarchiveProduct'])->name('unarchiveProduct');
    Route::get('admin/product/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
    Route::get('product/search', [ProductController::class, 'searchProduct'])->name('search-product');

    Route::post('archiveProductGroup', [ProductController::class, 'archiveProductGroup'])->name('archiveProductGroup');
    Route::post('unarchiveProductGroup', [ProductController::class, 'unarchiveProductGroup'])->name('unarchiveProductGroup');

    // *ARCHIVE SELECT ID WHETHER IT IS USER OR CATEGORY
    Route::post('archive/{id}', [RegisteredUserController::class, 'archive'])->name('archive');
    Route::post('unarchive/{id}', [RegisteredUserController::class, 'unarchive'])->name('unarchive');


    //

    // *USER ARCHIVE
    Route::post('archive', [RegisteredUserController::class, 'archiveGroup'])->name('archiveGroup');
    Route::post('unarchive', [RegisteredUserController::class, 'unarchiveGroup'])->name('unarchiveGroup');


    // *CATEGORY ARCHIVE
    Route::post('archiveCategoryGroup', [CategoryController::class, 'archiveCategoryGroup'])->name('archiveCategoryGroup');
    Route::post('unarchiveCategoryGroup', [CategoryController::class, 'unarchiveCategoryGroup'])->name('unarchiveCategoryGroup');
    Route::post('category/archive/{id}', [CategoryController::class, 'archiveCategory'])->name('archiveCategory');
    Route::post('category/unarchive/{id}', [CategoryController::class, 'unarchiveCategory'])->name('unarchiveCategory');


    // *SUBCATEGORY ARCHIVE
    Route::post('/category/subcategory/archive/{id}', [SubcategoryController::class, 'archiveSubcategory'])->name('archiveSubcategory');
    Route::put('/category/subcategory/unarchive/{id}', [SubcategoryController::class, 'unarchiveSubcategory'])->name('unarchiveSubcategory');



    // UPDATE RECORD
    Route::put('update/{id}', [RegisteredUserController::class, 'update'])->name('update-store');
    Route::put('category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category-update');
    Route::put('category/subcategory/update/{id}', [SubcategoryController::class, 'updateSubcategory'])->name('subcategory-update');

    //membership routes
    Route::get('admin/membership', [AdminMembershipController::class, 'redirectMembership'])->name('membershipRedirect');
    Route::get('admin/membership/pending-membership', [AdminMembershipController::class, 'pendingMembership'])->name('pending.request-membership');
    // adding member action
    Route::post('admin/member/add', [AdminMembershipController::class, 'addMember'])->name('application-membership');
    // membership pending actions
    Route::post('pending-membership/accepted/{id}', [AdminMembershipController::class, 'acceptedMembership'])->name('acceptedMembership');
    Route::post('pending-membership/rejected/{id}', [AdminMembershipController::class, 'rejectedMembership'])->name('rejectedMembership');

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

});

