<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
   function index() {
    $users = User::all();
    return response()->json(['users' => $users]);
   } 

   function show($id) {
    return response()->json(['users' =>User::find($id)]);
   }

   function store(Request $request) {
    print_r($request);
    User::create(['uid'=>$request->uid, 'email'=>'test@gmail.com', 'password'=>'password', 'last_loginned_at'=>Carbon::today()]);
    return response() -> json(['message' => 'successfully created']);
   }

   function update(Request $request) {
    $user = User::find($request->$id);
    $user->fill($request->all());
    $user->save();
   }

   function destroy($id) {
    $user = User::find($id);
    $user->delete();
    return response() -> json(['message' => 'successfully deleted']);
   }
   
}
