<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        return view( 'products.favorite.index', [
            'products' => Product::where('user_id',Auth::user()->id)->get()
        ]);
    }
}
