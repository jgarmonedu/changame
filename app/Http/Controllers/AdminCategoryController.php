<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Category::all())
                ->addColumn('action', 'admin/categories/category-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.categories.index');
    }

    public function store(Request $request)
    {
        $categoryId = $request->id;
        $attributes   = array_merge(
            [ 'id' => $categoryId ],
            [
                'name' => $request->name,
                'slug' => $request->slug
            ]);

        $category = Category::updateOrCreate($attributes);
        return Response()->json($category);
    }

    public function edit(Request $request)
    {
        $category = Category::query()->where('id',$request->id)->first();
        return Response()->json($category);
    }

    public function destroy(Request $request)
    {
        $category = Category::query()->where('id',$request->id)->delete();
        return Response()->json($category);
    }

    protected function validateCampaign(?Category $category = null): array
    {
        $category ??= new Category();

        return request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
    }
}
