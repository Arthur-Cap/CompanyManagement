<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company;
use App\Http\Controllers\projectController;
use App\Http\Controllers\TaskController;
use App\Jobs\testQueue;
use Illuminate\Support\Facades\Cache;


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

Route::get('/', [Company::class, 'create']);

Route::get('/company/{company}', [projectController::class,'create']);

Route::get('/project/{project}', [TaskController::class,'create']);

Route::post('/search', [projectController::class,'search']);


Route::get('/lock', function (){
    dispatch(new testQueue);
    return "Locked";
});

Route::get('/clean', function (){
    Cache::forget('lockkPage');
});

