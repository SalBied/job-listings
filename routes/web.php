<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');
Route::view('/contact', 'contact');

//Route::resource('jobs', JobController::class)->only(['index', 'show']);
//Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');
//Route::controller(JobController::class)->group(function (){
    Route::get('/jobs',  [JobController::class,'Index']);
    Route::get('/jobs/create',  [JobController::class,'create']);
    Route::get('/jobs/{job}', [JobController::class,'show']);

    Route::post('/jobs', [JobController::class,'store'])
        ->middleware('auth');

    Route::get('/jobs/{job}/edit', [JobController::class,'edit'])
        ->middleware('auth')
        ->can('edit', 'job');
     //   ->can('edit_job', 'job');


    Route::patch('/jobs/{job}', [JobController::class,'update']);
    Route::delete('/jobs/{job}',[JobController::class,'destroy']);



//Auth
Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);


Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);


Route::get('/test', function() {
    $job = \App\Models\Job::first();
    TranslateJob::dispatch($job);
    return 'done';
});
