<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", function (  ) {
    return view('home' );
});


Route::get("/main", function ( ) {
    return view('main' );
});


Route::post("/register", [UserController::class , 'register']);
Route::post("/logout", [UserController::class , 'logout']);
Route::post("/login", [UserController::class , 'login']);

// All post controllers goes here
Route::post('/create-post' , [ PostController::class , 'createPost' ]);
Route::get('/all-posts' , [PostController::class , 'viewAllPosts' ]);
Route::get('/edit-post/{post}' , [PostController::class , 'editPost' ]);
Route::put('/edit-post/{post}' , [PostController::class , 'updatePost' ]);
Route::delete('/delete-post/{post}' , [PostController::class , 'deletePost' ]);


