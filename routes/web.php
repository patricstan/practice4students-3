<?php

use App\Http\Controllers\Auth\DashboardRedirectController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Faculty\FacultyCompanies;
use App\Http\Livewire\Dashboard\Faculty\FacultyIndex;
use App\Http\Livewire\Dashboard\Faculty\FacultyStudents;
use App\Http\Livewire\Dashboard\Faculty\FacultyTemplates;
use App\Http\Livewire\Dashboard\Student\StudentDocuments;
use App\Http\Livewire\Dashboard\Student\StudentIndex;
use App\Http\Livewire\Dashboard\Student\StudentInternshipStatus;
use App\Http\Livewire\Dashboard\Student\StudentResume;
use App\Http\Livewire\Guest\CompanyGrid;
use App\Http\Livewire\Guest\OfferGrid;
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

Route::group([], function () {

    Route::get('/', WelcomeController::class)
        ->name('home');

    Route::get('companies', CompanyGrid::class)
        ->name('companies');

    Route::get('offers', OfferGrid::class)
        ->name('offers');

    Route::get('offers?tableFilters[company_name][value]={company_id}', OfferGrid::class)
        ->name('offers_company');
});


Route::middleware('web')->group(function () {

    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::middleware('auth')->group(function () {

    Route::get('dashboard', DashboardRedirectController::class)
        ->name('dashboard');

    Route::post('logout', LogoutController::class)->name('logout');

    Route::get('profile', ProfileController::class)->name('profile');
});

Route::name('faculty.')->prefix('faculty')->middleware(['auth', 'user-access:faculty'])->group(function () {
    Route::get('dashboard', FacultyIndex::class)->name('dashboard');
    Route::get('templates', FacultyTemplates::class)->name('templates');
    Route::get('companies', FacultyCompanies::class)->name('companies');
    Route::get('students', FacultyStudents::class)->name('students');
    //     Route::get('dashboard', App\Http\Livewire\Dashboard\Faculty\Index::class)->name('dashboard');
    //     Route::get('template/create', App\Http\Livewire\Dashboard\Faculty\Templates\TemplateCreate::class)->name('template.create');
    //     Route::get('template/edit/{id}', App\Http\Livewire\Dashboard\Faculty\Templates\TemplateEdit::class)->name('template.edit');
    //     Route::get('test', App\Http\Livewire\DocumentFill::class)->name('test');
    //     // Route::get('users', App\Http\Livewire\Dashboard\Faculty\Users\UsersIndex::class)->name('users');
    //     // Route::get('info', App\Http\Livewire\Dashboard\Company\About::class)->name('info');
});

// Route::name('company.')->prefix('company')->middleware(['auth', 'user-role-access:company'])->group(function () {
//     Route::get('dashboard', App\Http\Livewire\Dashboard\Company\Index::class)->name('dashboard');
//     Route::get('about', App\Http\Livewire\Dashboard\Company\About::class)->name('about');
//     Route::get('offers', App\Http\Livewire\Dashboard\Company\Offers\OffersIndex::class)->name('offers');
//     Route::get('offers/create', App\Http\Livewire\Dashboard\Company\Offers\OfferCreate::class)->name('offers.create');
//     Route::get('offers/edit/{id}', App\Http\Livewire\Dashboard\Company\Offers\OfferEdit::class)->name('offers.edit');
//     Route::get('candidates', App\Http\Livewire\Dashboard\Company\Candidates::class)->name('candidates');
//     Route::get('documents', App\Http\Livewire\Dashboard\Company\Documents::class)->name('documents');
//     Route::get('document/add', App\Http\Livewire\Dashboard\Company\DocumentAdd::class)->name('document.add');
//     Route::get('student_documents', App\Http\Livewire\Dashboard\Company\StudentDocuments::class)->name('student.documents');
// });

Route::name('student.')->prefix('student')->middleware(['auth', 'user-access:student'])->group(function () {

    Route::get('/dashboard', StudentIndex::class)->name('dashboard');

    Route::get('/documents', StudentDocuments::class)->name('documents');

    Route::get('resume', StudentResume::class)->name('resume');

    Route::get('internship-status', StudentInternshipStatus::class)->name('internship');

    // Route::get('apply/{oid}', OfferApply::class)->name('apply');
    // Route::get('document/add', App\Http\Livewire\Student\DocumentAdd::class)->name('document.add');
});



// Route::get('password/reset', Email::class)
//     ->name('password.request');

// Route::get('password/reset/{token}', Reset::class)
//     ->name('password.reset');

// Route::middleware('auth')->group(function () {
//     Route::get('email/verify', Verify::class)
//         ->middleware('throttle:6,1')
//         ->name('verification.notice');

//     Route::get('password/confirm', Confirm::class)
//         ->name('password.confirm');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
//         ->middleware('signed')
//         ->name('verification.verify');

//     Route::post('logout', LogoutController::class)
//         ->name('logout');
// });
