<?php

namespace App\Http\Controllers;

use App\Enums\State;
use App\Models\Agreement;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductAgreementController extends Controller
{

    protected array $filters = [];

    public function index()
    {
        $user = User::find(Auth::user())->first();
        return view('products.agreements.index', [
            'filters' => $this->getFilters(),
            'products' => $user->agreements()->paginate(8)
        ]);
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function update(Product $product)
    {
        if ($product->change_with) {
            switch ($product->state){
                case '1': $product->state = '2';
                    break;
                case '2': $product->state = '3';
                    break;
            }
            $product->save();
            session()->flash('success', __('Product') .' '. __('State')['types'][ucwords(State::tryFrom($product->state)->name)] );
        } else {
            session()->flash('error', __('There is not an agreements for this product'));
        }
        return back();
    }

    public function destroy(Product $product)
    {
        if ($product->change_with) {
            session()->flash('success', __('Agreement') .' '. __('Removed!')."!");
            DB::beginTransaction();
            try {
                $product->change_with = null;
                $product->state = null;
                $product->save();

                $productChangeWith = Product::find($product->change_with);
                $productChangeWith->change_with = null;
                $productChangeWith->state = null;
                $productChangeWith->save();

                $agreement = Agreement::getAgreementByProduct($product->id);
                $agreement->delete();
                DB::commit();
                session()->flash('success', __('You have reached an agreement'));

            } catch (Exception $e) {
                DB::rollback();
                session()->flash('success',$e->getMessage());
            }
        } else {
            session()->flash('error', __('There is not an agreements for this product'));
        }
        return redirect('/products');
    }
}
