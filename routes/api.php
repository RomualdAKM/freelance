<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FormationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function(){

    Route::post('register','register');
    Route::post('login','login');
    Route::get('info_auth_user','info_auth_user');
    Route::post('change_password','change_password');

});
Route::controller(DocumentController::class)->group(function(){

    Route::post('create_document','create_document');
    Route::post('edit_document/{id}','edit_document');
    Route::get('get_documents','get_documents');
    Route::get('get_document/{id}','get_document');
  
});
Route::controller(CustomerController::class)->group(function(){

    Route::post('create_customer','create_customer');
    Route::get('get_customers','get_customers');
    // Route::post('edit_document/{id}','edit_document');
    // Route::get('get_document/{id}','get_document');
  
});

Route::controller(FormationController::class)->group(function(){

    Route::post('create_formation','create_formation');
    Route::get('get_formations','get_formations');
    Route::post('edit_formation/{id}','edit_formation');
    Route::get('get_formation/{id}','get_formation');
    Route::get('delete_formation/{id}','delete_formation');
  
});