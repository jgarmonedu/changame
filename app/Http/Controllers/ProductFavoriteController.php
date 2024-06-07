<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductFavoriteController extends Controller
{
    protected array $filters = [];

    public function index()
    {
        return view('products.favorites.index', [
            'filters' => $this->getFilters(),
            'products' => User::find(Auth::user()->id)->favorites()->whereNull('change_with')->paginate(8)
        ]);
    }

    public function show(Product $product)
    {
        $users = Favorite::query()
            ->where('product_id',$product->id)
            ->pluck('user_id');

        return view('products.favorites.show', [
            'filters' => $this->getFilters(),
            'products' =>  Product::query()
                ->whereIn('user_id',$users)
                ->whereNull('change_with')
                ->paginate(8)
        ]);
    }


    public function getFilters()
    {
        return $this->filters;
    }

    public function store(Product $product)
    {
        // if $product exist in Agreement not possible to work with it
        if ($product->change_with) {
            session()->flash('error', __('Product cannot be marked as') .' '. __('Favorite').'. '. __('It is in a agreement'));
        } else {
            $favorite = $this->getFavorite($product->id,Auth::user()->id);
            if ($favorite) {       // Whether exist in Favorite table
                $favorite->delete();
            } else {
                $agreement = $this->searchAgreement($product->owner);
                if ($agreement) {
                    DB::beginTransaction();
                    try {
                        $newAgreement = new Agreement();
                        $newAgreement->create([
                            'product_id_user1' => $product->id,
                            'product_id_user2' => $agreement->product_id
                        ]);

                        $product->change_with = $agreement->product_id;
                        $product->state = 1;
                        $product->save();

                        $productAgreement = Product::findOrFail($agreement->product_id);
                        $productAgreement->change_with = $product->id;
                        $productAgreement->state = 1;
                        $productAgreement->save();

                        DB::commit();
                        session()->flash('success', __('You have reached an agreement'));
                        redirect('my.products.agreement');;
                    } catch (\Exception $e) {
                        DB::rollback();
                        session()->flash('success',$e->getMessage());
                    }
                } else {
                    $product->favorites()->create([
                        'user_id' => Auth::user()->id
                    ]);
                }
            }
        }
        return back();;
    }

    public function searchAgreement(User $owner)
    {
        $productsUser = User::find(Auth::user()->id)->products->pluck('id'); // Get products->id from User
        return Favorite::query()
            ->whereIn('product_id', $productsUser)
            ->where('user_id', $owner->id)
            ->first();
    }

    public function getFavorite($product, $user)
    {
        return Favorite::query()
            ->where('product_id', $product)
            ->where('user_id', $user)
            ->first();
    }


}
