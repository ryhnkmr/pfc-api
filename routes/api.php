<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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