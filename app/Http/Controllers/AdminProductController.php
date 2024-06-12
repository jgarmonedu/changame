<?php

namespace App\Http\Controllers;

use App\Enums\Condition;
use App\Enums\Difficulty;
use App\Enums\Language;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    public function index()
    {
        return view( 'products.owner.index', [
            'products' => Product::where('user_id',Auth::user()->id)->paginate(5)
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
        DB::beginTransaction();
        try {
            $files = request()->file('thumbnail');

            Product::create(array_merge($this->validateproduct(), [
                'user_id' => request()->user()->id,
            ]));
            $productId = DB::getPdo()->lastInsertId();
            if ($files) {
                foreach($files as $file) {
                    Image::create([
                        'product_id' => $productId,
                        'thumbnail' => $file->store('thumbnails')
                    ]);
                }
            }
            DB::commit();
            session()->flash('success', __('Product has been created'));
        } catch (\Exception $e) {
            DB::rollback();
            back()->withErrors($this->validateproduct());
            //session()->flash('error', $e->getMessage());
        }
        return redirect('/my/products');;
    }

    public function edit(Product $product)
    {
        if ($product->campaign) {
            session()->flash('error', __('Product has been checked for').' '.__('Donation'));
            return redirect('/my/products');;
        } elseif ($product->change_with) {
            session()->flash('error',  __('Product is in a').' '.__('Agreement'));
            return redirect('/my/products');;
        }  else {
            return view('products.owner.edit', ['product' => $product]);
        }
    }

    public function update(Product $product)
    {
        if (is_null($product->change_with)) {
            DB::beginTransaction();
            try {
                $files = request()->file('thumbnail');

                if ($files) {
                    // previously the images are deleted
                    $images = Image::where('product_id', $product->id)->get();
                    foreach ($images as $image) {
                        Storage::delete($image->thumbnail);
                        $image->delete();
                    }

                    foreach($files as $file) {
                        Image::create([
                            'product_id' => $product->id,
                            'thumbnail' => $file->store('thumbnails')
                        ]);
                    }
                }
                $product->update($this->validateproduct($product));
                DB::commit();
                session()->flash('success', __('Product has been updated') );
            } catch (\Exception $e) {
                DB::rollback();
                back()->withErrors($this->validateproduct($product));
            }
        } else {
            session()->flash('error', __('Product cannot be Updated!'));
        }
        return redirect('/my/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/my/products')->with('success', 'product Deleted!');
    }

    protected function validateProduct(?Product $product = null): array
    {
        $product ??= new Product();

        return request()->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'player_count_from' => ['required','numeric','min:1'],
            'player_count_to' => ['required','numeric','gte:player_count_from'],
            'from_age' => ['required','numeric','min:1'],
            'play_time' => ['nullable','numeric'],
            'release_year' => ['nullable','date_format:Y','before:today','after:1950'],
//            'difficulty' => ['required', Rule::in(array_column(Difficulty::cases(), 'value'))],
            'difficulty' => ['required', Rule::enum(Difficulty::class)],
            'condition' => ['required', Rule::enum(Condition::class)],
            'language' => ['required', Rule::enum(Language::class)]
        ]);
    }
}
