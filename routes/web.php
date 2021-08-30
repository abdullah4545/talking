<?php

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


//admin panel route
Route::group(['middleware'=>['admin:admin']], function(){
    Route::get('/admin-login', [App\Http\Controllers\AdminController::class, 'loginForm']);
    Route::post('/admin-login', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.login');
});
Route::group(['middleware'=>'AdminAuthenticateMiddleware'], function(){
    Route::get('/manage-talkingInfo', [App\Http\Controllers\TalkingInfoController::class, 'index']);
    Route::post('/update-talkingInfo/{id}', [App\Http\Controllers\ProfileCover::class, 'update']);
    Route::get('/edit-talkingInfo/{id}', [App\Http\Controllers\TalkingInfoController::class, 'edit']);
    Route::get('/add-talkingInfo', [App\Http\Controllers\TalkingInfoController::class, 'view']);
    Route::post('/store-talkingInfo', [App\Http\Controllers\TalkingInfoController::class, 'store']);

});
Route::group(['middleware'=>'UserAuthenticateMiddleware'], function(){
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
    Route::post('/user-education-save', [App\Http\Controllers\UserController::class, 'saveEducation'])->name('saveEducation');
    Route::get('/edit-user-education/{id}', [App\Http\Controllers\UserController::class, 'editEducation'])->name('editEducation');
    Route::post('/update-user-education/{id}', [App\Http\Controllers\UserController::class, 'updateEducation'])->name('updateEducation');
    Route::delete('/delete-user-education/{id}', [App\Http\Controllers\UserController::class, 'deleteEducation'])->name('deleteEducation');
    Route::post('/user-work-save', [App\Http\Controllers\UserController::class, 'saveWork'])->name('saveWork');
    Route::get('/edit-user-work/{id}', [App\Http\Controllers\UserController::class, 'editWork'])->name('editWork');
    Route::post('/update-user-work/{id}', [App\Http\Controllers\UserController::class, 'updateWork'])->name('updateWork');
    Route::delete('/delete-user-work/{id}', [App\Http\Controllers\UserController::class, 'deleteWork'])->name('deleteWork');
    Route::post('/user-interest-save', [App\Http\Controllers\UserController::class, 'saveInterest'])->name('saveInterest');
    Route::get('/edit-user-interest/{id}', [App\Http\Controllers\UserController::class, 'editInterest'])->name('editInterest');
    Route::post('/update-user-interest/{id}', [App\Http\Controllers\UserController::class, 'updateInterest'])->name('updateInterest');
    Route::delete('/delete-user-interest/{id}', [App\Http\Controllers\UserController::class, 'deleteInterest'])->name('deleteInterest');
    Route::post('/user-basic-info-update/{id}', [App\Http\Controllers\UserController::class, 'updateBasicInfo'])->name('updateBasicInfo');
    Route::post('/save-profile-picture/{id}', [App\Http\Controllers\ProfileCover::class, 'storeProfile'])->name('storeProfile');
    Route::post('/save-cover-photo/{id}', [App\Http\Controllers\ProfileCover::class, 'storeCover'])->name('storeCover');
    Route::get('/user_photos', [App\Http\Controllers\UserController::class, 'user_photos'])->name('user_photos');
    Route::get('/user_videos', [App\Http\Controllers\UserController::class, 'user_videos'])->name('user_videos');
    Route::get('/user_about', [App\Http\Controllers\UserController::class, 'user_about'])->name('user_about');
    Route::post('/user-post-save/{id}', [App\Http\Controllers\PostController::class, 'savePost'])->name('savePost');
    Route::get('/edit-user-post/{id}', [App\Http\Controllers\PostController::class, 'editPost'])->name('editPost');
    Route::delete('/delete-user-post/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');
    Route::post('/user-post-comments/{id}', [App\Http\Controllers\PostController::class, 'saveComments'])->name('saveComments');
    Route::delete('/delete-comment/{id}', [App\Http\Controllers\PostController::class, 'deleteComment'])->name('deleteComment');
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'user_search'])->name('user_about');
    Route::post('/sent-friend-request/{id}', [App\Http\Controllers\FriendController::class, 'sentFrRequest'])->name('sentFrRequest');
    Route::post('/confirm-friend-request/{id}', [App\Http\Controllers\FriendController::class, 'confirmFrRequest'])->name('confirmFrRequest');
    Route::post('/delete-friend-request/{id}', [App\Http\Controllers\FriendController::class, 'deleteFrRequest'])->name('deleteFrRequest');
    Route::post('/post-reaction/{id}', [App\Http\Controllers\PostController::class, 'postReactions'])->name('postReactions');
    Route::get('/single_post_{id}', [App\Http\Controllers\PostController::class, 'singlePost'])->name('singlePost');
    Route::get('/user_profile_{id}', [App\Http\Controllers\UserController::class, 'singleUser'])->name('singleUser');
    Route::get('/get-user-data/{id}', [App\Http\Controllers\UserController::class, 'getUserData'])->name('getUserData');

});

Route::post('/admin-logout', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.logout')->middleware('auth:admin');

Route::post('/logout', App\Http\Controllers\LogoutController::class)->name('logout')->middleware('auth:web');
Route::get('/after-register', [ App\Http\Controllers\UserController::class, 'afterRegister'])->name('after-register');
Route::post('/user-basic-info-save', [App\Http\Controllers\UserController::class, 'saveBasicInfo'])->name('saveBasicInfo');


//Dashboard Talking

Route::middleware(['auth.admin:admin', 'verified'])->get('/admin-dashboard', function () {
    return view('admin.content.adminMainContent');
})->name('admin.dashboard');
Route::middleware(['auth:sanctum,web', 'verified'])->get('/', function () {
    return view('frontEnd.home.homePage');
})->name('dashboard');
