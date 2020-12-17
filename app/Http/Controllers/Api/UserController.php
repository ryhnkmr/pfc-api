<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

ini_set('memory_limit', '512M');

class UserController extends Controller
{
   function index() {
    $users = User::all();
    return response()->json(['users' => $users]);
   } 

   function show(Request $request) {
     $user = User::where('uid', $request->uid)->first();
     return response()->json(['user' => $user]);
   }

   function store(Request $request) {
    $user = User::where('uid', $request->uid)->first();
    if ($user) {
      $message = 'alreadly existed account';
    } else {
      $user = User::Create([
        'uid'=> $request->uid,
        'email'=>$request->email,
        'password'=>$request->password,
        'last_loginned_at'=>Carbon::today(),
        'name'=>$request->name,
      ]);
      $message = 'successfully created';
    };
    return response() -> json(['message' => $message, 'user'=> $user]);
  }

   function update($id, Request $request) {
    Log::debug($id);
    Log::debug($request);
    $user = User::find($id);
    $user->fill($request->all())->save();

    return response() -> json(['message' => 'successfully updated', 'user'=> $user]);
   }

   function destroy($id) {
    $user = User::find($id);
    $user->delete();
    return response() -> json(['message' => 'successfully deleted']);
   }
}