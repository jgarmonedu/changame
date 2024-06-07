<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Campaign;
use App\Models\User;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;

class ProductDonateController extends Controller
{
    protected array $filters = [];

    public function index()
    {
        return view('products.donations.index', [
            'filters' => $this->getFilters(),
            'products' => User::find(Auth::user()->id)->donations()->whereNotNull('campaign')->paginate(8),
            'campaigns' => Campaign::all()
        ]);
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function update(Product $product)
    {
        // if $product exist in Agreement not possible to work with it

        if ($product->change_with) {
            session()->flash('error', __('Product cannot be marked as') .' '. __('Favorite').'. '. __('It is in a agreement'));
        } else {
            $campaign = new Campaign;
            if ($campaign->campaignActive()) {
                try {
                    if (is_null($product->campaign)) {
                        $product->campaign = $campaign->id;
                        session()->flash('success', __('Product has been checked for') . ' ' . __('Donate'));
                    } else {
                        $product->campaign = null;
                        session()->flash('success', __('Product has been unchecked for') . ' ' . __('Donate'));
                    }
                    $product->save();
                } catch (Exception $e) {
                    session()->flash('error', $e->getMessage());
                }
            } else {
                session()->flash('error', __('There is not an active campaign!'));
            }
        }
        return back();
    }

}
