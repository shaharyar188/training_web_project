<?php
require __DIR__ . '/auth.php';

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserMetaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UploadVedioController;
use App\Http\Controllers\mailerController;
use Illuminate\Support\Facades\DB;


  Route::get('/clear', function () {

      Artisan::call('view:clear');
      Artisan::call('cache:clear');
      Artisan::call('route:clear');
      Artisan::call('optimize:clear');
      Artisan::call('config:cache');
      echo 'Cache Cleared';
  });
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


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/about_us', 'about_us');
    Route::get('/training_program', 'training_program');
    Route::get('/contact_us', 'contact_us');
    Route::get('/faqs', 'faq');
    Route::get("/tutorial","instractionAndTuturial");
    Route::get('/category/{id}','category');
    Route::get('/subcategory/{id}','subcategory');
    Route::get('/video_details/{id}','video_details');
    Route::post('/send-mail', 'sendEmail');
});
Route::post('/sendMail', [mailerController::class, "SendMail"]);
Route::get('/dashboard', function () {
    $allfaqcount=DB::table('faqs')->get()->count();
   $allVideo=DB::table('upload_vedios')->get()->count();
    return view('layouts.Dashlead.index',compact('allfaqcount','allVideo'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource("/user", UserController::class);
Route::get("/changeStatus/{id}", [UserController::class, 'changeStatus']);
Route::get("/userDetail/{id}", [UserController::class, 'userDetail']);
Route::resource('/faq', FaqController::class);
Route::PUT('delSingleImg/{id}',[FaqController::class,"delImage"]);
Route::resource('/upload_video', UploadVedioController::class);
Route::resource('category',\App\Http\Controllers\CategoryController::class);
Route::resource('sub_category',\App\Http\Controllers\SubCategoryController::class);
Route::controller(UploadVedioController::class)->group(function (){
    Route::get('/get_subcategory/{id}','get_subcategory');
});
