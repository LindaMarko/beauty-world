<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_sv' => 'required',
            'category_icon' => 'required',
        ],
        [
            'category_name_en.required' => 'This input field is required.',
            'category_name_sv.required' => 'This input field is required.'
        ]);


        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_sv' => $request->category_name_sv,
            'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en)),
            'category_slug_sv' => strtolower(str_replace('','-',$request->category_name_sv)),
            'category_icon' => $request->category_icon
        ]);

        return redirect()->back();
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request, $id)
    {

        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_sv' => $request->category_name_sv,
            'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en)),
            'category_slug_sv' => strtolower(str_replace('','-',$request->category_name_sv)),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->route('all.category');

    }

    public function CategoryDelete($id)
    {
       Category::findOrFail($id)->delete();

        return redirect()->back();
    }
}
