<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsControleer;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('saque/{number_account}/{value}/{currency}', [TransactionsControleer::saque, 'saque']);
Route::post('deposito/{number_account}/{value}/{currency}', [TransactionsControleer::deposito, 'deposito']);
Route::get('extrato/{number_}', [TransactionsControleer::extato, 'extrato']);