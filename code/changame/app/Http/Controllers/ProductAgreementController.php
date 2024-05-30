<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Support\Facades\Auth;

class ProductAgreementController extends Controller
{

    protected array $filters = [];

    public function index()
    {
        $agreements = new Agreement;
        return view('products.agreements.index', [
            'filters' => $this->getFilters(),
            'products' => $agreements->agreementsByUser(Auth::user())->paginate(8)
        ]);
    }

    public function getFilters()
    {
        return $this->filters;
    }

}
