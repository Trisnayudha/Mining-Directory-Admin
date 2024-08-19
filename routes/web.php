<?php

use App\Http\Controllers\Asset\MediaResourceController;
use App\Http\Controllers\Asset\NewsController;
use App\Http\Controllers\Asset\ProductController;
use App\Http\Controllers\Asset\ProjectController;
use App\Http\Controllers\Asset\VideoController;
use App\Http\Controllers\Company\CompanyAddressController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\CarouselController;
use App\Http\Controllers\Home\PrivacynPoliceController;
use App\Http\Controllers\Home\StatisticController;
use App\Http\Controllers\Master\CategoryController;
use App\Http\Controllers\Master\PopularCategoryController;
use App\Http\Controllers\Master\ProjectTypeController;
use App\Http\Controllers\Master\SubCategoryController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

// Routes for Asset-digital controllers
Route::resource('media-resources', MediaResourceController::class);
Route::resource('news', NewsController::class);
Route::resource('products', ProductController::class);
Route::resource('projects', ProjectController::class);
Route::resource('videos', VideoController::class);

// Routes for Company controllers
Route::resource('companies', CompanyController::class);
Route::post('companies/import', [CompanyController::class, 'import'])->name('companies.import');
// Routes for Company Address controllers
Route::get('companies-address/{slug}', [CompanyAddressController::class, 'index'])->name('companies-address.index');
Route::get('companies-address/create/{slug}', [CompanyAddressController::class, 'create'])->name('companies-address.create');
Route::resource('companies-address', CompanyAddressController::class)->except(['index', 'create']);
// Routes for Home controllers
Route::resource('carousels', CarouselController::class);
Route::resource('privacy-policies', PrivacynPoliceController::class);
Route::resource('statistics', StatisticController::class);

// Routes for Master-data controllers
Route::resource('categories', CategoryController::class);
Route::resource('popular-categories', PopularCategoryController::class);
Route::resource('project-types', ProjectTypeController::class);
Route::resource('sub-categories', SubCategoryController::class);

// Routes for Users controllers
Route::resource('users', UsersController::class);
