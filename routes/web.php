<?php

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/blog',[BlogController::class,'index']);
Route::get('/blog/add',[BlogController::class,'add']);
Route::post('/blog/store',[BlogController::class,'store']);
Route::get('/blog/edit/{id}',[BlogController::class,'edit']);
Route::get('/blog/view/{id}',[BlogController::class,'view'])->name('view_blog');
Route::patch('/blog/edit/{id}',[BlogController::class,'update']);
Route::delete('/blog/delete/{id}',[BlogController::class,'delete']);
Route::get('/blog/restore/{id}',[BlogController::class,'restore']);

Route::get('blog/users',[UsersController::class,'index']);
Route::get('users',function(){
    return  Phone::with('user')->get();
});

Route::post('comment/{blog_id}',[CommentController::class,'store']);
