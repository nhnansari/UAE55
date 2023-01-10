<?php

use App\Http\Controllers\LicensePlateGeneratorController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    $ads = \App\Models\PostedAds::orderby('id','desc')->where('status','approved')->paginate(15);

    return view('theme1.index',["ads"=>$ads]);
})->name('home');
Auth::routes();

Route::middleware('auth')->group(function (){

Route::controller(\App\Http\Controllers\ProfileController::class)->prefix('profile')->group(function (){
    Route::get('/','page');
    Route::post('/update','update');
});
Route::get('good-bye',function (){
   \Illuminate\Support\Facades\Auth::logout();
   return response()->redirectToRoute('home');
});
Route::controller(LicensePlateGeneratorController::class)->group(function(){

   Route::get('paint','paint')->name('paint');
   Route::get('new_ad','new_ad')->name('new_ad');
   Route::post('render','renderPlate');
   Route::post('render_ad','renderPlateAd');

});


Route::controller(\App\Http\Controllers\DashboardController::class)->group(function(){
   Route::get("dashboard",'dashboard')->name('dashboard');

});
Route::controller(\App\Http\Controllers\AdsController::class)->group(function(){

   Route::get('my_ads','userAds')->name('my_ads');
   Route::post('ad/mark_sold/{id}','markSold');
   Route::post('ad/delete/{id}','deleteAd');
});

Route::controller(\App\Http\Controllers\BidsController::class)->prefix('bid')->group(function(){
    Route::post('place/{ad_id}','createBid');
    Route::get('delete','deleteBid');
    Route::get('my','placedBids');
    Route::get('offers','offeredBids');
});
Route::controller(\App\Http\Controllers\UserFavoritesController::class)->group(function(){
   Route::get('favorites','listFavorites')->name('favorites');
   Route::post('favorites/add/{ad}','addFavorite');
   Route::post('favorites/remove/{id}','removeFavorite');
});

});
Route::controller(\App\Http\Controllers\AdsController::class)->group(function(){
    Route::get('distinctive_numbers','listAds')->name('list_ads');
    Route::post('distinctive_numbers','listAds');
    Route::get('number/{ad}','viewAd')->name('number');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ADMIN ROUTES
Route::prefix('admin')->middleware(['role:admin','auth'])->group(function(){
    Route::controller(\App\Http\Controllers\Admin\AdminDashboardController::class)->group(function(){
       Route::get('/','page')->name('admin');
       Route::get('/plate/new','add_page')->name('admin.new_plate');
       Route::post('/save_plate','savePlate');
       Route::get('/plates','plates');
       Route::get('/plates/datatable','platesDatatable');
       Route::post('/plates/delete/{id}','deletePlate');
    });

    Route::controller(\App\Http\Controllers\Admin\FilesController::class)->group(function(){
       Route::get('formats/images','uploadPage');
       Route::post('formats/upload','uploadLicensePlateFormat');
       Route::get('fonts','listFonts');
       Route::get('images','listImages');
       Route::get('images/preview/{filename}','previewFormatFile');
       Route::post('images/delete/{filename}','deleteFile');
       Route::post('image_dimensions','getImageDimensions');
    });

    Route::controller(\App\Http\Controllers\Admin\AdminPreviewController::class)->group(function(){
       Route::post('render','render');
    });

    Route::controller(\App\Http\Controllers\Admin\AdminAdsController::class)->group(function(){
       Route::get('ads','page')->name('admin.ads');
        Route::get('ads/datatable','datatable');
       Route::post('ads/delete/{id}','delete');
       Route::post('ads/approve/{id}','approve');
       Route::post('ads/reject/{id}','reject');
    });

    Route::controller(\App\Http\Controllers\Admin\AdminSettingsController::class)->group(function(){
       Route::get('settings','page');
       Route::post('settings/save','updateSettings');
    });

    Route::controller(\App\Http\Controllers\Admin\AdminUsersController::class)->prefix('users')->group(function(){
       Route::get('/','dataTablePage')->name('admin.users');
       Route::get('/datatable','dataTable');
       Route::post('delete/{id}','deleteUser');
       Route::post('ban/{id}','banUser');
       Route::post('unban/{id}','unBanUser');
       Route::post('makeAdmin/{id}','makeAdmin');
    });
});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

Route::controller(\App\Http\Controllers\PagesController::class)->group(function(){
    Route::get('privacy','privacy');

});
