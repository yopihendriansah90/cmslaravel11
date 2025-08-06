<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/blog',function(){

//     $profile = 'aku programme3r';
//  return view('blog',['data'=>$profile]);
// })->name('blog');


Route::get('/blog',[BlogController::class,'index']);

// Route::get('/blog/{id}',function(Request $request){
//     return redirect()->route('blog');
// });