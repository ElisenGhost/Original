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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('maincontent');


Auth::routes();

Route::get('/home', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::get('/personalaria', function (){
    return view('personalaria');
})->middleware('auth')->name("personalaria");

Route::group(['middleware' => 'auth'], function() {
Route::get('/editprofile', [App\Http\Controllers\HomeController::class, 'editpage'])->name("home.editpage");
Route::put('/editconfirm', [App\Http\Controllers\HomeController::class, 'edit'])->name("home.edit");
Route::get('/editphoto', [App\Http\Controllers\HomeController::class, 'editphotopage'])->name('home.editphotopage');
Route::put('/editphoto', [App\Http\Controllers\HomeController::class, 'editphoto'])->name('home.editphoto');

Route::get('/chat/{recipient}', [App\Http\Controllers\ChatsController::class, 'index'])->name('chat');
Route::post('/messagesend/{recipient}', [App\Http\Controllers\ChatsController::class, 'store'])->name('messagesend');

Route::get('/coachswim', [App\Http\Controllers\TrainerController::class, 'swimindex'])->name('coachswim');
Route::get('/coachgym', [App\Http\Controllers\TrainerController::class, 'gymindex'])->name('coachgym');

Route::get('/usershow/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('usershow');

Route::get('/messages', [App\Http\Controllers\TrainerController::class, 'dashboard'])->name('messages');

Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'showuser'])->name('admin');

Route::get('/changerole/{user}', [App\Http\Controllers\AdminController::class, 'changerolepage'])->name("admin.changerolepage");
Route::put('/editrole/{user}', [App\Http\Controllers\AdminController::class, 'changerole'])->name("admin.changerole");

Route::get('/editsport/{id}', [App\Http\Controllers\AdminController::class, 'editSports'])->name("editsport");

Route::post('/addSport', [App\Http\Controllers\AdminController::class, 'addSports'])->name("admin.addSport");
Route::get('/addSportpage', [App\Http\Controllers\AdminController::class, 'addSportspage'])->name("admin.addSportpage");
});
