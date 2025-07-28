<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BestDealController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\FeaturedSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeheroController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Properties_detailsController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\VideoController;
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



// Route::get(uri: '/hero', [HomeheroController::class, 'hero'])->name('hero');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');




require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function ()

 {
    // Home Hero Section Routes
     Route::get('/admin2/hero', [HomeheroController::class, 'index'])->name('admin2.hero.index');
     Route::post('/admin2/hero', [HomeheroController::class, 'store'])->name('admin2.hero.store');
     Route::get('admin2/herosection/{id}/edit', [HomeheroController::class, 'edit'])->name('admin2.home-banner.edit');
    Route::put('admin2/herosection/{id}', [HomeheroController::class, 'update'])->name('admin2.home-banner.update');
    Route::get('/showfetchtable',[HomeheroController::class, 'fetchtable'])->name('admin2.home-banner.fetchtable');
    Route::delete('admin2/herosection/{id}', [HomeheroController::class, 'destroy'])->name('admin2.home-banner.destroy');


// Featured Section Routes
    Route::get('/admin2/featured-section', [FeaturedSectionController::class, 'index'])->name('admin2.featuredsection.index');
    Route::post('/admin2/featured-section', [FeaturedSectionController::class, 'store'])->name('admin2.featuredsection.store');
    Route::get('/admin2/featured-section/fetchtable', [FeaturedSectionController::class, 'fetchtable'])->name('admin2.featuredsection.fetchtable');
    Route::get('/admin2/featured-section/{id}/edit', [FeaturedSectionController::class, 'edit'])->name('admin2.featured.edit');
    Route::put('/admin2/featured-section/{id}', [FeaturedSectionController::class, 'update'])->name('admin2.featured.update');
    Route::delete('/admin2/featured-section/{id}', [FeaturedSectionController::class, 'destroy'])->name('admin2.featured.destroy');

// Best Deals Routes
    Route::get('/admin2/bestdeals', [BestDealController::class, 'index'])->name('admin2.bestdeals.index');
    Route::post('/admin2/bestdeals', [BestDealController::class, 'store'])->name('admin2.bestdeals.store');
    Route::get('/admin2/bestdeals/fetchtable', [BestDealController::class, 'fetchtable'])->name('admin2.bestdeals.fetchtable');
    Route::get('/admin2/bestdeals/{id}/edit', [BestDealController::class, 'edit'])->name('admin2.bestdeals.edit');
    Route::put('/admin2/bestdeals/{id}', [BestDealController::class, 'update'])->name('admin2.bestdeals.update');
    Route::delete('/admin2/bestdeals/{id}', [BestDealController::class, 'destroy'])->name('admin2.bestdeals.destroy');

// Property Routes
    Route::get('/admin2/properties',[PropertyController::class, 'index'])->name('admin2.propertey.index');
    Route::post('/admin2/properties',[PropertyController::class,'store'])->name('admin2.propertey.store');

//Video Routes
    Route::get('/admin2/videos', [VideoController::class, 'index'])->name('admin2.videos.index');
    Route::post('/admin2/videos', [VideoController::class, 'store'])->name('admin2.videos.store');

//Contact Routes
    Route::get('/admin2/contact',[ContactController::class, 'viewcontact'])->name('admin2.contact.view');
Route::post('/admin2/contact',[ContactController::class, 'store'])->name('admin2.contact.store');
    Route::get('/admin2/contact/fetchtable', [ContactController::class, 'fetchtable'])->name('admin2.contact.fetchtable');
    Route::get('/admin2/contact/{id}/edit', [ContactController::class, 'edit'])->name('admin2.contact.edit');
    Route::put('/admin2/contact/{id}', [ContactController::class, 'update'])->name('admin2.contact.update');
    Route::delete('/admin2/contact/{id}', [ContactController::class, 'destroy'])->name('admin2.contact.destroy');

// Show reply form
Route::get('/admin2/messages', [MessageController::class, 'viewMessages'])->name('admin2.messages.view');
Route::get('admin2/messages/{id}/reply', [MessageController::class, 'showReplyForm'])->name('admin2.messages.reply.form');
Route::get('/admin2/showmessage/{id}',[MessageController::class,'showmessage'])->name('showmessage');
Route::post('/admin2/messages', [MessageController::class, 'saveUserMessage'])->name('admin2.messages.store');
Route::post('/admin2/messages/{id}/reply', [MessageController::class, 'sendReply'])->name('admin2.messages.reply');
Route::delete('/admin2/message/{id}',[MessageController::class,'destroy'])->name('admin2.messages.destroy');


//profile Routes
  Route::get('/showprofile',[ProfileController::class,'showprofileform'])->name('profile.form');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


// Password update routes
    Route::get('/password', [PasswordController::class, 'showform'])->name('password.form');






});

Route::match(['get', 'post'], '/home', [HomeController::class, 'index'])->name('home');
Route::get('/apatmentfillter', [App\Http\Controllers\HomeController::class, 'apartment'])->name('apartmentfillter');
Route::get('/villafillter', [App\Http\Controllers\HomeController::class, 'villa'])->name('villafillter');
Route::get('/penthousefillter', [App\Http\Controllers\HomeController::class, 'penthouse'])->name('penthousefillter');
Route::get('/properties',[PropertyController::class,'property'])->name('properties');
Route::get('/showproperties_details',[Properties_detailsController::class, 'showproperties_details'])->name('showproperties_details');
Route::get('/showcontact',[ContactPageController::class,'index'])->name('showcontact');


Route::get('/settings', function () {
    return view('settings');
})->middleware(['auth'])->name('settings');
















