<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductFavoritesController extends Controller
{
    protected array $filters = [];

    public function index()
    {
        return view( 'products.favorites.index', [
            'filters' => $this->getFilters(),
            'products' => User::find(Auth::user()->id)->favorites()->paginate(8)
        ]);
    }

    public function getFilters(){
        return $this->filters;
    }

    public function store(Product $product)
    {
        // Get the element of the table.
        $favorite = Favorite::query()
            ->where('product_id', $product->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        // if exists the row is delete otherwise is create
        if ($favorite) {
            $favorite->delete();
        } else {
            $product->favorites()->create([
                'user_id' => Auth::user()->id
            ]);
        }

        return back();

    }
}
