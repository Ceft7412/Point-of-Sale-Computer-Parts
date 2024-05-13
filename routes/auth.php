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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\AdminMembershipController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // *These functions are provided by Laravel Breeze
    //login route
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
    //login functionality
    Route::post('auth/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    //forgot password route
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    //forgot password - email functionality
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    //reset password route
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    //reset password functionality
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// EMPLOYEE ROUTES
Route::middleware(['auth', 'verified', 'employee'])->group(function(){

    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::get('order/membership', [MembershipController::class, 'membership'])->name('membership');

    Route::get('order/products/{id}', [OrderController::class, 'getProduct'])->name('getProduct');
    Route::get('order/all-products', [OrderController::class, 'allProducts'])->name('allProducts');
    Route::get('order/category/{id}/getProducts', [OrderController::class, 'getCategoryProducts'])->name('getCategoryProducts');
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



    // *user - admin/employee actions
    Route::post('admin/user/archive/{id}', [RegisteredUserController::class, 'archive'])->name('archive');
    Route::post('admin/user/{id}', [RegisteredUserController::class, 'unarchive'])->name('unarchive');
    Route::put('/admin/user/update/{id}', [RegisteredUserController::class, 'update'])->name('update-store');
    Route::post('archive', [RegisteredUserController::class, 'archiveGroup'])->name('archiveGroup');
    Route::post('unarchive', [RegisteredUserController::class, 'unarchiveGroup'])->name('unarchiveGroup');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register-store');
    Route::get('admin/employee', [RegisteredUserController::class, 'create'])->name('employee');
    Route::get('admin/archive/archive-employee', [RegisteredUserController::class, 'redirectArchiveEmployee'])->name('archive-employee');
    Route::get('admin/employee/{id}', [RegisteredUserController::class, 'getUser'])->name('getUser');



    // *category actions
    Route::put('admin/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('category-update');
    Route::post('admin/category/archive/{id}', [CategoryController::class, 'archiveCategory'])->name('archiveCategory');
    Route::get('admin/archive/brands/check-category/{id}', [CategoryController::class, 'checkCategory'])->name('checkCategory');

    // *category archive actions
    Route::get('admin/archive/archive-category', [CategoryController::class, 'archivedCategories'])->name('archive-category');
    Route::post('admin/category/unarchive/{id}', [CategoryController::class, 'unarchiveCategory'])->name('unarchiveCategory');
    Route::post('unarchiveCategoryGroup', [CategoryController::class, 'unarchiveCategoryGroup'])->name('unarchiveCategoryGroup');
    

    // *subcategory actions
    Route::get('admin/category/brands', [SubcategoryController::class, 'index'])->name('brands');
    Route::get('admin/archive/archive-subcategory', [SubcategoryController::class, 'createArchive'])->name('archive-subcategory');
    Route::post('/category/brands/archive/{id}', [SubcategoryController::class, 'archiveSubcategory'])->name('archiveSubcategory');
    Route::post('archiveSubcategoryGroup', [SubcategoryController::class, 'archiveSubcategoryGroup'])->name('archiveSubcategoryGroup');
    Route::put('admin/subcategory/update/{id}', [SubcategoryController::class, 'updateSubcategory'])->name('subcategory-update');
    Route::get('admin/archive/product/check-brands/{id}', [SubcategoryController::class, 'checkSubcategory'])->name('checkSubcategory');

    // *subcategory archive actions
    Route::put('unarchiveSubcategoryGroup', [SubcategoryController::class, 'unarchiveSubcategoryGroup'])->name('unarchiveSubcategoryGroup');
    Route::put('admin/archive/brands/unarchive/{id}', [SubcategoryController::class, 'unarchiveSubcategory'])->name('unarchiveSubcategory');



    // *product actions
    Route::put('admin/product/update/{id}', [ProductController::class, 'updateProduct'])->name('product-update');
    Route::post('admin/product/archive/{id}', [ProductController::class, 'archiveProduct'])->name('archiveProduct');
    Route::put('admin/product/archive/unarchive/{id}', [ProductController::class, 'unarchiveProduct'])->name('unarchiveProduct');
    Route::put('unarchiveProductGroup', [ProductController::class, 'unarchiveProductGroup'])->name('unarchiveProductGroup');



    Route::get('admin/overview', [DashboardController::class, 'redirectOverview'])->name('overview');
    // *print route

    Route::get('admin/print', [PrintController::class, 'print'])->name('print');
   
    Route::get('admin/admin', [AdminController::class, 'redirectAdmin'])->name('admin');

    // * transaction
    Route::get('admin/transaction', [TransactionController::class, 'redirectTransaction'])->name('transaction');
    Route::get('admin/transaction/export', [TransactionController::class, 'exportTransaction'])->name('exportTransaction');
    Route::post('admin/transaction/receipt/{id}', [TransactionController::class, 'receipt'])->name('receipt');
    
    Route::get('admin/category', [CategoryController::class, 'redirectCategory'])->name('category');



    // Product Controller
    Route::get('admin/product', [ProductController::class, 'redirectProduct'])->name('product');


    // SUBCATEGORY ROUTE


    

    //GET THE VALUE BY SPECIFIC ID
    Route::get('admin/category/{id}', [CategoryController::class, 'getCategory'])->name('getCategory');
    Route::get('admin/category/subcategory/{id}', [SubcategoryController::class, 'getSubcategory'])->name('getSubcategory');



    // *Category
    

   
    Route::get('admin/archive/archive-admin', [AdminController::class, 'redirectArchiveAdmin'])->name('archive-admin');

    Route::get('admin/archive/archive-product', [ProductController::class, 'redirectArchiveProduct'])->name('archive-product');

    Route::post('category.store', [CategoryController::class, 'storeCategory'])->name('category-store');
    Route::post('subcategory.store', [SubcategoryController::class, 'storeSubcategory'])->name('subcategory-store');


    // Product
    Route::post('product.store', [ProductController::class, 'storeProduct'])->name('product-store');
    
   

    Route::get('admin/product/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
    Route::get('product/search', [ProductController::class, 'searchProduct'])->name('search-product');

    Route::post('archiveProductGroup', [ProductController::class, 'archiveProductGroup'])->name('archiveProductGroup');
   

    


    

    


    // *CATEGORY ARCHIVE
    Route::post('archiveCategoryGroup', [CategoryController::class, 'archiveCategoryGroup'])->name('archiveCategoryGroup');

    
    


    // *SUBCATEGORY ARCHIVE
   
   


    // *UPDATE RECORD
   
    
    

    // *membership routes
    Route::get('admin/membership', [AdminMembershipController::class, 'redirectMembership'])->name('membershipRedirect');
    Route::get('archive-member', [AdminMembershipController::class, 'redirectArchiveMember'])->name('archive-member');
    Route::get('admin/membership/pending-membership', [AdminMembershipController::class, 'pendingMembership'])->name('pending.request-membership');
    // *adding member action
    Route::post('admin/member/add', [AdminMembershipController::class, 'addMember'])->name('application-membership');

    // *update member action
    Route::put('admin/member/update/{id}', [AdminMembershipController::class, 'updateMember'])->name('update-member');

    Route::get('admin/member/{id}', [AdminMembershipController::class, 'getMember'])->name('update-member');
    //  *archive members action
    Route::post('admin/member/archive', [AdminMembershipController::class, 'archiveMembers'])->name('archive-members');
    Route::post('admin/member/unarchive', [AdminMembershipController::class, 'unarchiveMembers'])->name('unarchive-members');
    Route::post('admin/member/archive/{id}', [AdminMembershipController::class, 'archiveSingleMember'])->name('archive-single-member');
    Route::post('admin/member/unarchive/{id}', [AdminMembershipController::class, 'unarchiveSingleMember'])->name('unarchive-single-member');
    // *reject membership action
    Route::post('admin/member/reject_membership', [AdminMembershipController::class, 'rejectmemberships'])->name('decline-members');
    
    // *membership pending actions
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

