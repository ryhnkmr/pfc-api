<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   function index() {
    $users = User::all();
    logger($users);
    return response()->json(['users' => $users]);
   } 

   function show($id) {
    return response()->json(['users' =>User::find($id)]);
   }

   function update() {

   }

   function destroy($id) {
    $user = User::find($id);
    $user->delete();
    return response() -> json(['message' => 'successfully deleted']);
   }
   
}
