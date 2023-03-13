<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\FrontAdsController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\SaveAddController;
use App\Http\Controllers\AdminListingController;
use App\Http\Controllers\FraudController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\SendEmailWithClickController;
use App\Http\Controllers\ShowCommentUserController;
use App\Http\Controllers\BusinessPageController;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Category; 
use Illuminate\Support\Facades\View;
use App\Http\Controllers\MailController;


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

Route::get('/clear-cache', function() {
        // $run = Artisan::call('storage:link');
        $run = Artisan::call('cache:clear');
        // $run = Artisan::call('route:cache');
        // $run = Artisan::call('migrate');
        
        return 'FINISHED';  
    });
    
Route::get('/about-us', function () {
    return view('about'); 
});
Route::get('/privacy-policy', function () {
    return view('privacypolicy');
});


Auth::routes();


Route::group(['prefix'=>'auth' ,'middleware'=>'admin'] ,function(){

    Route::get('/', function () {
        return view('backend.admin.index');
    });
    Route::resource('/category' ,CategoryController::class);
    Route::resource('/subcategory' ,SubCategoryController::class);
    Route::resource('/childcategory' ,ChildCategoryController::class);

    // Admin Listing
    Route::get('/allads' , [AdminListingController::class , 'index'])->name('all.ads');
    // for all report
    Route::get('/reported-ads' ,[FraudController::class ,'index'])->name('all.reported.ads');
    //new
    Route::get('/show-all-register-user' ,[AdminListingController::class ,'showalluser'])->name('all.show-all-register-user');
    Route::post('/delete-all-user/{id}' ,[AdminListingController::class ,'removealluser'])->name('delete-all-user');
    //new
    Route::post('/remove-report/{id}' , [FraudController::class , 'remove'])->name('remove.report');
    // comment user
    Route::get('/show-comment' , [ShowCommentUserController::class , 'index'])->name('show-comment');
    Route::post('/remove-comment/{id}' , [ShowCommentUserController::class , 'remove'])->name('remove-comment');
    // comment User

});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard' ,[DashboardController::class , 'index'])->name('dashboard');

Route::get('/' ,[FrontAdsController::class , 'index']);

// ads
Route::group(['middleware'=>'auth'] , function(){
    Route::get('/ads/create' ,[AdvertisementController::class , 'create'])->name('ads.create');
    Route::post('add/store' , [AdvertisementController::class ,'store'])->name('add.store');
    Route::get('/ads' , [AdvertisementController::class ,'index'])->name('ads.index');
    Route::get('/ads/edit/{id}' ,[AdvertisementController::class ,'edit'])->name('ads.edit');
    Route::put('ads/update/{id}' ,[AdvertisementController::class , 'update'])->name('ads.update');
    Route::post('delate/{id}' , [AdvertisementController::class , 'destroy'])->name('ads.delete');
    Route::get('/add-pending' , [AdvertisementController::class , 'pendingadds'])->name('pending.add');

    Route::post('delate-image-with-click' , [AdvertisementController::class , 'deletewithclicktoimage']);

});


// profile
Route::group(['middleware'=>'auth'] ,function(){

 Route::get('profile' ,[ProfileController::class , 'index'])->name('profile');
 Route::post('update' ,[ProfileController::class , 'updateprofile'])->name('update.profile');
 
});

/* Google Social Login */
Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::group(['middleware' => ['guest']], function() {
    Route::get('/login/google', 'GoogleLoginController@redirect')->name('login.google-redirect');
    Route::get('/login/google/callback', 'GoogleLoginController@callback')->name('login.google-callback');
});
    
});  

// Choose category route
Route::get('/cashier/increasequantity/{id}',[AdvertisementController::class ,'getCategory']);
Route::get('/cashier/increasequantity2/{id}',[AdvertisementController::class ,'getCategory2']);

// view All category
view::composer(['*'],function($view){
    $menu = Category::with('subcategories')->get();
    $view->with('menus' ,$menu);
}); 

// show user
Route::get('user/{userId}/view' , [FrontEndController::class ,'viewuser'])->name('show.user.ads');
//frontend 
Route::get('/category/{category}' ,[FrontEndController::class , 'showcategory'])->name('category.show');
Route::get('/product/{subcategory}' ,[FrontEndController::class , 'filtersubcategory'])->name('subcategory.show');
Route::get('/product/{subcategory}/{childcategory}' ,[FrontEndController::class , 'filterchildcategory'])->name('childcategory.show');
// filter price
Route::get('filter' ,[FrontEndController::class , 'filterprice'])->name('filter');
Route::get('products/{id}/{slug}',[FrontEndController::class ,'singlepage'])->name('product.view');

Route::get('products/{id}',[FrontEndController::class ,'singlepageforonlyelectronic'])->name('product.singlepageforonlyelectronic');
// message
Route::group(['middleware'=>'auth'] , function(){
    Route::post('/sendtosaller' , [SendMessageController::class , 'sendmessagetosaller']);
    // test
    // Route::post('sendtosaller/{receiver}/{ad}' , [SendMessageController::class , 'sendmessagetosaller'])->name('send');
    // test
    Route::get('message' , [SendMessageController::class , 'index'])->name('message');
    Route::get('/users' , [SendMessageController::class , 'chatwiththisuser']);
    Route::get('/message/user/{id}' ,[SendMessageController::class , 'showmessage'])->name('show-chat');
    Route::post('/start-conversation' , [SendMessageController::class , 'startconversation']);
});

// login with facbook
Route::get('auth/facebook', [SocialLoginController::class , 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialLoginController::class , 'loginWithFacebook']);
// save add
Route::post('/saveadd' , [SaveAddController::class , 'saveadd']);
Route::post('/ads/remove' , [SaveAddController::class ,  'removeadd'])->name('ad.remove');
Route::get('ads/show-add' , [SaveAddController::class ,  'showadd'])->name('show.add');

// Reort this ad
Route::post('/report-this-ad' , [FraudController::class , 'store'])->name('report.ad');

/* New Added Routes */
// Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 
// comment user

Route::group(['middleware'=>'auth'] , function(){ 
 Route::post('/comment' , [FrontEndController::class , 'comment']);
 Route::get('/show-all-comment' , [FrontEndController::class , 'showallcomments']);
 //  with click user in massenger to another user
Route::post('/send-email-to-user-click' ,[SendEmailWithClickController::class , 'index']);
// update favorite table
Route::post('/update-favorite' , [SendEmailWithClickController::class , 'update']);
// favorit hard
Route::post('/favorit-list' , [FrontEndController::class , 'favoritlist']);
// show favorit list
Route::get('/show-favorit-list/{authuser}' , [FrontEndController::class , 'showfavoritlist'])->name('show-favorit-list');
// Delete favorit list
Route::post('delete-favorit-list/{id}' , [FrontEndController::class , 'removefavoritlist'])->name('delete-favorit-list');
});

Route::post('/find-with-country' , [FrontAdsController::class , 'findcountry'])->name('find-with-country');
route::get('/find-country', [FrontAdsController::class ,  'findcountryinbaner']);
// Send Rate
Route::post('/sendrate' , [FrontEndController::class , 'updaterate']);
// Show Business page in index
Route::get('business-page' , [BusinessPageController::class , 'index'])->name('business-page');

// manage-business-pages
Route::group(['middleware'=>'auth'] , function(){ 
// manage-business-pages
Route::get('manage-business-pages' , [BusinessPageController::class , 'manage'])->name('manage-business-pages');
Route::post('/send-to-business-page' , [BusinessPageController::class , 'sendtobusinesspage']); 
Route::get('/single-business-page' , [BusinessPageController::class  ,  'singlebusinesspage'])->name('single-business-page');
});







  