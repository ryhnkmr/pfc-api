<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FoodRecordListController;

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

Route::apiResource('user', UserController::class);
Route::apiResource('user.food_record_list', FoodRecordListController::class);
// Route::get('/user', function (Request $request) {
	
//     $users = App\Models\User::all();
	
// 	return response()->json(['users' => $users]);
// });

Route::get('/dashboard', function (Request $request) {

    $data = [];
    $new_users_count = 0;
    $active_users_count = 0;
    for ($i=0; $i<7; $i++) {
        $access_num = App\Models\LoginLogs::whereDate('created_at', Carbon::today()->subDay($i))->count();
        array_push($data, $access_num);
    };
    
    $new_users_count = App\Models\User::whereBetween('created_at',[Carbon::today()->subDay(3), Carbon::today()])->count();
    $active_users_count = App\Models\User::whereDate('last_loginned_at', [Carbon::today()->subDay(3), Carbon::today()])->count(); 

    $labels = [
        date("Y/m/d", strtotime("-6 day")),
        date("Y/m/d", strtotime("-5 day")),
        date("Y/m/d", strtotime("-4 day")),
        date("Y/m/d", strtotime("-3 day")),
        date("Y/m/d", strtotime("-2 day")),
        date("Y/m/d", strtotime("-1 day")),
        date("Y/m/d"),
    ];
    
    return response()->json(['data' => array_reverse($data), 'labels' => $labels, 'new_users' => $new_users_count, 'active_users' => $active_users_count]);
});

Route::get('/requests', function (Request $request) {

    $data = [];
    for ($i=0; $i<7; $i++) {
        $access_num = App\Models\LoginLogs::whereDate('created_at', Carbon::today()->subDay($i))->count();
        array_push($data, $access_num);
    };
    $labels = [
        date("Y/m/d", strtotime("-6 day")),
        date("Y/m/d", strtotime("-5 day")),
        date("Y/m/d", strtotime("-4 day")),
        date("Y/m/d", strtotime("-3 day")),
        date("Y/m/d", strtotime("-2 day")),
        date("Y/m/d", strtotime("-1 day")),
        date("Y/m/d"),
    ];
    
    return response()->json(['data' => array_reverse($data), 'labels' => $labels]);
});