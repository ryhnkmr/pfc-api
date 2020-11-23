<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::get('/user', function (Request $request) {
	
    $users = App\Models\User::all();

    // $name = Input::get('name');
    // $email = Input::get('email');

    // //query
    // $query = App\Models\User::query();

    // //もしnameがあれば
    // if(!empty($name)){
    //     $query->where('name','like','%'.$name.'%');
    // }

    // //もしemailがあれば
    // if(!empty($email)){
    //     $query->where('email','like','%'.$email.'%');
    // }

    // //paginate
    // $usres = $query->paginate(10);
	
	return response()->json(['users' => $users]);

});

Route::get('/dashboard', function (Request $request) {

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