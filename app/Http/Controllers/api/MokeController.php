<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MokeController extends Controller
{
    public function index(){

        // $data = file_get_contents(storage_path('app/public/mock/').'getDemographicDataOK.json');
        // $data = file_get_contents(storage_path('app/public/mock/').'getRankReached.json');
        $data = file_get_contents(storage_path('app/public/mock/').'countriesApiPortal.json');
        $products = json_decode($data, true);

        return response()->json($products, 200);
    }

    public function show(Request $request){

        $data = file_get_contents(storage_path('app/public/mock/').$request->name.".json");
        $products = json_decode($data, true);

        return response()->json($products, 200);
    }

    public function validateJSON(string $json): bool {
        try {
            $test = json_decode($json, null, JSON_THROW_ON_ERROR);
            if(is_object($test)) return true;
            return false;
        } catch  (Exception $e) {
            return false;
        }
    }
}
