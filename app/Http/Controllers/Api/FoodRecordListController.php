<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\FoodRecordListController;
use App\Models\FoodRecordList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FoodRecordListController extends Controller
{
    function index($id ,Request $request) {
        $user = User::find($id);
        $records = $user->food_record_lists;
        $favorite_records = [];
        foreach ($records as $record) {
            if ($record['favorite_flg'] == 1) {
                array_push($favorite_records, $record);
            }
        }
        Log::debug($favorite_records);
        return response()->json(['message'=> 'success', 'records' => $records, 'favorite_records'=>$favorite_records]);
    }

    function store($id, Request $request) {
        $user = User::find($id);
        Log::debug($request);
        $record = FoodRecordList::create([
            'user_id'=> $user->id,
            'protain'=> $request->protain,
            'fat'=>$request->fat,
            'carbo'=>$request->carbo,
            'calorie'=>$request->calorie,
            'quantity'=>$request->quantity,
            'name'=>$request->name,
            'favorite_flg'=>$request->favorite_flg,
            'recorded_at'=>$request->recorded_at,
        ]);
        return response() -> json(['message' => 'successfully created', 'record'=> $record]);
    }
}
