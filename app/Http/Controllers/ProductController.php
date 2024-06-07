<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Product;

class ProductController extends Controller
{
    protected array $filters = ['search', 'category', 'owner', 'noOwner', 'from_age', 'player_count_from', 'player_count_to', 'play_time', 'release_year', 'difficulty','condition', 'language'];

    public function index() {

        return view( 'products.index', [
            'filters' => $this->getFilters(),
            'products' => Product::latest()->whereNull('change_with')->filter(
                request($this->filters)
            )->paginate(8)->withQueryString()
        ]);
    }

    public function getFilters(){
        return $this->filters;
    }


    public function show(Product $product)
    {
        $campaign = new Campaign();
        return view('products.show', [
            'product' => $product,
            'campaign' => $campaign->campaignActive(),
            'images' => $product->images()->get()
        ]);
    }



}
