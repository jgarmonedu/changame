<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalDataController extends Controller
{
    public function show(Request $request)
    {
        $products = new ProductController();
        $last_products = $products->getLastProducts(9);
        $ods = json_decode(file_get_contents("js/ods.json"),false);    // false as an object - true as array
        $goals = json_decode(file_get_contents("js/goals.json"),false);

        return view ('index', [
            'goals' => $goals,
            'ods' => $ods,
            'products' => $last_products
        ]);
    }
}
