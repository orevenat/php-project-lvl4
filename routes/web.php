<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskStatusController;
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

Route::view('/', 'welcome');
Route::resources([
    'task_statuses' => TaskStatusController::class
]);

Auth::routes();
