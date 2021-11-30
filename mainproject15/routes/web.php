<?php


//frontEnd ===========================================================================================

use Illuminate\Support\Facades\Artisan;

Route::resource('/', 'frontEnd\FrontViewController');

Route::resource('know-us', 'frontEnd\KnowUsController');
Route::resource('about-us', 'frontEnd\AboutUsController');
Route::resource('history', 'frontEnd\HistoryController');
Route::resource('sister-concern', 'frontEnd\SisterConController');
Route::resource('management', 'frontEnd\ManagementController');
Route::resource('achievement', 'frontEnd\AcheiveController');
Route::resource('csr', 'frontEnd\CSRController');

Route::get('/sustainability', 'frontEnd\SustainAblilityController@index')->name('sustain.index');
Route::get('pdf/{id}', 'frontEnd\SustainAblilityController@pdf')->name('sustain.pdf');

Route::resource('brand', 'frontEnd\BrandController');
Route::post('/brand/brand-detail/{id}', 'frontEnd\BrandController@detail');

Route::resource('media', 'frontEnd\MediaController');
Route::resource('news-event', 'frontEnd\NewsEventController');
Route::resource('commercial', 'frontEnd\CommercialController');
Route::resource('press-release', 'frontEnd\PressReleaseController');
Route::resource('career', 'frontEnd\CareerController');
Route::resource('contact-us', 'frontEnd\ContactUsController');
Route::resource('cv', 'frontEnd\CVController');

// ====================================================================================================

//backEnd =============================================================================================

Route::group(['middleware' => ['Checklogin']], function () {

Route::resource('dashboard', 'backEnd\DashboardController');

Route::resource('slider', 'backEnd\SliderController');
// Route::post('/slider-edit', 'backEnd\SliderController@editData')->name('slider.edit');

Route::resource('about', 'backEnd\AboutUsController');
Route::resource('admin-commercial', 'backEnd\CommercialController');
Route::resource('admin-PressRelease', 'backEnd\PressReleaseController');
Route::resource('admin-brand', 'backEnd\BrandController');
Route::resource('admin-brand-category', 'backEnd\BrandCategoryController');
Route::get('/brand/precedence/{id}', 'backEnd\BrandCategoryController@getPrecedence');
Route::get('/precedence/check/{id}/{value}', 'backEnd\BrandCategoryController@checkPrecedence');

Route::resource('product', 'backEnd\ProductController');
Route::get('/categ-option/{id}', 'backEnd\ProductController@category');
Route::get('/youtube-link/{id}', 'backEnd\ProductController@youtubeLinkIndex')->name('youtube.link');
Route::resource('product-youtube-link', 'backEnd\ProYoutubeController');

Route::resource('admin-news-event', 'backEnd\NewsEventController');
Route::resource('newsevent-image', 'backEnd\NewsEventImageController');

Route::resource('admin-csr', 'backEnd\CSRController');
Route::resource('admin-achievement', 'backEnd\AcheiveController');
Route::resource('admin-sister-concern', 'backEnd\SisterConController');
Route::resource('admin-history', 'backEnd\HistoryController');
Route::resource('admin-chairman', 'backEnd\ChairmanController');
Route::resource('admin-director', 'backEnd\DirectorController');
Route::resource('admin-manageTeam', 'backEnd\ManageTeamController');
Route::resource('admin-career', 'backEnd\CareerController');

Route::get('sustain-ability', 'SustainAbilityController@index')->name('sustain.ability.index');
Route::post('sustain-ability/store', 'SustainAbilityController@store')->name('sustain.ability.store');
Route::post('sustain-ability/show', 'SustainAbilityController@edit')->name('sustain.ability.show');
Route::post('sustain-ability/edit', 'SustainAbilityController@edit')->name('sustain.ability.edit');
Route::post('sustain-ability/update', 'SustainAbilityController@update')->name('sustain.ability.update');
Route::post('sustain-ability/delete', 'SustainAbilityController@destroy')->name('sustain.ability.delete');

Route::post('sustain-ability/pdf/store', 'SustainAbilityController@storePdf')->name('sustain.ability.pdf.store');
Route::post('sustain-ability/show/pdf', 'SustainAbilityController@editPdf')->name('sustain.ability.pdf.show');
Route::post('sustain-ability/edit/pdf', 'SustainAbilityController@editPdf')->name('sustain.ability.pdf.edit');
Route::post('sustain-ability/update/pdf', 'SustainAbilityController@updatePdf')->name('sustain.ability.pdf.update');
Route::post('sustain-ability/delete/pdf', 'SustainAbilityController@destroyPdf')->name('sustain.ability.pdf.delete');


});

// ====================================================================================================

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clear-cache', function () {
    $configCache = Artisan::call('config:cache');
    $clearCache  = Artisan::call('cache:clear');
    // return what you want
    return "Finished";
});

// ====================================================================================================


