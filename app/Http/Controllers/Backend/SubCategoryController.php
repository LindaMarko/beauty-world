<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

        $categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	return view('backend.category.subcategory_view',compact('subcategory','categories'));

    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
             'category_id' => 'required',
             'subcategory_name_en' => 'required',
             'subcategory_name_sv' => 'required',
         ],[
             'category_id.required' => 'Please select Any option',
             'subcategory_name_en.required' => 'Input SubCategory English Name',
         ]);

        SubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_name_en' => $request->subcategory_name_en,
         'subcategory_name_sv' => $request->subcategory_name_sv,
         'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
         'subcategory_slug_sv' => strtolower(str_replace(' ', '-',$request->subcategory_name_sv)),
         ]);

         return redirect()->back();

    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request){

    	$subcat_id = $request->id;

    	 SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_sv' => $request->subcategory_name_sv,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_sv' => strtolower(str_replace(' ', '-',$request->subcategory_name_sv)),


    	]);
		return redirect()->route('all.subcategory');

    }

    public function SubCategoryDelete($id){

    	SubCategory::findOrFail($id)->delete();
		return redirect()->back();

    }
}
