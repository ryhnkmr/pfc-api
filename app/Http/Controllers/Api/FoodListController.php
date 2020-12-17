<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\FoodListController;
use Illuminate\Http\Request;
use App\Models\FoodList;
use Illuminate\Support\Facades\Log;

class FoodListController extends Controller
{
    function index(Request $request) {
        Log::debug($request->text);
        $foods = FoodList::where('name', 'like', '%'.$request->text.'%')->get();
        Log::debug($foods);
        return response()->json(['message'=> 'success', 'result' => $foods]);
    }

    // ただレコード用に用意しただけ
    function store() {
        // CSV取得
        $f = fopen("/Users/ryohei/Desktop/Desktop - MBP/programing/G's Academy/Projects/pfc-api/STFC2015.csv", "r");
        // test.csvの行を1行ずつ読み込みます。
        while($line = fgetcsv($f)){
        // 読み込んだ結果を表示します。
            Log::debug($line);
            FoodList::Create([
                'name'=> $line[3],
                'calorie'=>(int)$line[5],
                'protain'=>(int)$line[8],
                'fat'=>(int)$line[11],
                'carbo'=>(int)$line[16],
                'quantity'=>100,
            ]);
        }
        // test.csvを閉じます。
        fclose($f);
        return response()->json(['message'=> 'success']);
    }
}
