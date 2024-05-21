<?php

namespace App\Http\Controllers;

use App\Enums\Condition;
use App\Enums\Difficulty;
use App\Enums\Language;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function index()
    {
        return view( 'products.owner.index', [
            'products' => Product::where('user_id',Auth::user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('products.owner.create', [
            'filters' => []
        ]);
    }

    public function store()
    {
        Product::create(array_merge($this->validateproduct(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/my/products');
    }

    public function edit(product $product)
    {
        return view('products.owner.edit', ['product' => $product]);
    }

    public function update(product $product)
    {
        $attributes = $this->validateproduct($product);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $product->update($attributes);

        return back()->with('success', 'product Updated!');
    }

    public function destroy(product $product)
    {
        $product->delete();

        return back()->with('success', 'product Deleted!');
    }

    protected function validateProduct(?Product $product = null): array
    {
        $product ??= new Product();

        return request()->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail' => $product->exists ? ['image'] : ['required', 'image'],
            'player_count_from' => ['required','integer|min:1|max:10'],
            'player_count_to' => ['required','integer|min:1|max:10'],
            'from_age' => ['required','integer|min:0|max:99'],
            'play_time' => ['integer|min:10'],
            'release_year' => ['integer|min:1950'],
//            'difficulty' => ['required', Rule::in(array_column(Difficulty::cases(), 'value'))],
            'difficulty' => ['required', Rule::enum(Difficulty::class)],
            'condition' => ['required', Rule::enum(Condition::class)],
            'language' => ['required', Rule::enum(Language::class)]
        ]);
    }
}
