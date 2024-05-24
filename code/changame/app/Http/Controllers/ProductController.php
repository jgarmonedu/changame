<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    protected array $filters = ['search', 'category', 'owner', 'from_age', 'player_count_from', 'player_count_to', 'play_time', 'release_year', 'difficulty','condition', 'language'];

    public function index() {

        return view( 'products.index', [
            'filters' => $this->getFilters(),
            'products' => Product::latest()->filter(
                request($this->filters)
            )->paginate(8)->withQueryString()
        ]);
    }

    public function getFilters(){
        return $this->filters;
    }

    public function getLastProducts($number) {
        return Product::latest()->take($number)->get();
    }

    
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }



}
