<?php

use App\Http\Controllers\BasketballController;
use App\Models\MakeUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
});*/


Route::get('/api/makeup', function (Request $request) {
        if ($limit = $request->query('limit')) {
            return Cache::remember('makeup-' . $limit, now()->addHour(), function () use ($limit) {
                return MakeUp::paginate($limit);
            });
        }
        return MakeUp::all();
    });