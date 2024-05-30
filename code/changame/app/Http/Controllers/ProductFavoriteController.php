<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductFavoritesController extends Controller
{
    protected array $filters = [];

    public function index()
    {
        return view('products.favorites.index', [
            'filters' => $this->getFilters(),
            'products' => User::find(Auth::user()->id)->favorites()->where('state',' ')->paginate(8)
        ]);
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function store(Product $product)
    {
        // if $product exist in Agreement not possible to work with it
        if ($this->existsAgreement($product->id)) {
            // TODO add message
        } else {
            $favorite = $this->getFavorite($product->id,Auth::user()->id);
            if ($favorite) {       // Whether exist in Favorite table
                $favorite->delete();
            } else {
                $agreement = $this->searchAgreement($product->owner);
                if ($agreement) {
                    $product->agreement()->create([
                        'product_id_user2' => $agreement->product_id
                    ]);
                    // Change product_user_1 to A state
                    $this->changeStateProduct($agreement->product_id,'A');
                    // Change product_user_2 to A state
                    $this->changeStateProduct($product->id,'A');
                    //$newFavorite = $this->getFavorite($agreement->product_id, $agreement->user_id);
                    //$newFavorite->delete();
                } else {
                    $product->favorites()->create([
                        'user_id' => Auth::user()->id
                    ]);
                }
            }
        }

        return back();
    }

    public function searchAgreement(User $owner)
    {
        $productsUser = User::find(Auth::user()->id)->products->pluck('id'); // Get products->id from User
        return Favorite::query()
            ->whereIn('product_id', $productsUser)
            ->where('user_id', $owner->id)
            ->first();
    }

    public function existsAgreement($product)
    {
        return Agreement::query()
            ->where('product_id_user1', $product)
            ->orWhere('product_id_user2', $product)
            ->exists();
    }

    public function getFavorite($product, $user)
    {
        return Favorite::query()
            ->where('product_id', $product)
            ->where('user_id', $user)
            ->first();
    }

    public function changeStateProduct($id, $type) {
        $product = Product::findOrFail($id);
        $product->state = $type;
        $product->save();

        return true;
    }

}
