<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('user/{id}',function($id){
return "User ID is $id";
});
Route::get('/post/{slug?}',function($slug = 'default-post'){
    return "Post-slug:$slug";
});
Route::get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard');
Route::get('/test',function(){
    $url = route('dashboard');
    return "THE URL For the dashboard route is $url";
});
Route::prefix('admin')->group(function () {
Route::get('/users', function () {
return 'Admin Users';
});
Route::get('/posts', function () {
return 'Admin Posts';
});
});
Route::middleware(['auth'])->group(function () {
Route::get('/profile', function () {
return 'User Profile';
});
Route::get('/login', function () {
    return "login page";
})->name('login');
Route::get('/dashboard', function () {
return view('dashboard');
})->middleware('auth');
});
Route::get('/user/{id}', [UserController::class, 'show']);
Route::fallback(function(){
    return response()->view('error.404',[],404);
});