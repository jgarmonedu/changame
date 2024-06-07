<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class LocalDataController extends Controller
{
    public function show()
    {
        $products = new Product();
        $campaign = new Campaign();
        $ods = json_decode(File::get("js/data/ods.json"),false);    // false as an object - true as array
        $goals = json_decode(File::get("js/data//goals.json"),false);

        return view ('index', [
            'goals' => $goals,
            'ods' => $ods,
            'products' => $products->getLastProducts(9),
            'campaign' => $campaign->campaignActive(),
        ]);
    }
}
