<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('employees/{id?}', [EmployeeController::class, 'index']);
Route::post('employees', [EmployeeController::class, 'create']);
Route::put('employees/{id}', [EmployeeController::class, 'update']);
Route::delete('employees/{id}', [EmployeeController::class, 'delete']);

// 

Route::get('house/', [HouseController::class, 'index']);
Route::get('house/{id}', [HouseController::class, 'show']);
Route::post('house', [HouseController::class, 'store']);
Route::get('house/{id}/edit', [HouseController::class, 'edit']);
Route::put('house/{id}', [HouseController::class, 'update']);
Route::delete('house/{id}', [HouseController::class, 'destroy']);
// 
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
}); 
