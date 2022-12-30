<?php
use Illuminate\Support\Facades\Route;
use Laravel\Blog\Controllers\PageMetaController;
use Laravel\Blog\Controllers\ContactController;
use Laravel\Blog\Controllers\SettingController;
// use App\Http\Controllers\ProfileController;

Route::get('calculator', function(){
	return view('blog::add');
});

Route::group(['middleware' => ['web']], function () {
    /// Page
    Route::get('/page/{slug?}', [Laravel\Blog\Controllers\PageController::class, 'index'])->name('page.index');
    Route::post('/page/update', [Laravel\Blog\Controllers\PageController::class, 'store'])->name('page.store');
    Route::post('/page/update/other', [Laravel\Blog\Controllers\PageController::class, 'pageUpdate'])->name('page-update');
    Route::post('page/uploadImage', [Laravel\Blog\Controllers\PageController::class, "image_upload"])->name('pages.uploadImage');

    /// Contact-US
    Route::resource('contacts', ContactController::class);

    // Setting
    Route::resource('settings', SettingController::class);

});
/// Page Meta
// Route::get('/page-meta/{slug?}', [App\Http\Controllers\PageMetaController::class, 'index'])->name('page-meta.index');
// Route::resource('meta', PageMetaController::class);





// Profile
// Route::resource('profile', ProfileController::class);
