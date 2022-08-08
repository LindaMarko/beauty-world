<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function AddProduct()
    {
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories','brands'));

	}

	public function StoreProduct(Request $request)
	{

		$image = $request->file('product_thumbnail');
		$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
		Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
		$save_url = 'upload/products/thumbnail/'.$name_gen;

		$product_id = Product::insertGetId([
			'brand_id' => $request->brand_id,
			'category_id' => $request->category_id,
			'subcategory_id' => $request->subcategory_id,
			'subsubcategory_id' => $request->subsubcategory_id,
			'product_name_en' => $request->product_name_en,
			'product_name_sv' => $request->product_name_sv,
			'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
			'product_slug_sv' => strtolower(str_replace(' ', '-', $request->product_name_sv)),
			'product_type' => $request->product_tyoe,

			'product_qty' => $request->product_qty,
			'product_tags_en' => $request->product_tags_en,
			'product_tags_sv' => $request->product_tags_sv,
			'product_size_en' => $request->product_size_en,
			'product_size_sv' => $request->product_size_sv,
			'product_color_en' => $request->product_color_en,
			'product_color_sv' => $request->product_color_sv,

			'price' => $request->price,
			'discount_price' => $request->discount_price,
			'short_descp_en' => $request->short_descp_en,
			'short_descp_sv' => $request->short_descp_sv,
			'long_descp_en' => $request->long_descp_en,
			'long_descp_sv' => $request->long_descp_sv,

			'hot_deals' => $request->hot_deals,
			'featured' => $request->featured,
			'special_offer' => $request->special_offer,
			'special_deals' => $request->special_deals,

			'product_thumbnail' => $save_url,
			'status' => 1,
			'created_at' => Carbon::now(),

		]);

		////////// Multiple Image Upload Start ///////////
		$images = $request->file('multi_img');

		foreach ($images as $img) {
			$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
			Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
			$uploadPath = 'upload/products/multi-image/'.$make_name;

			MultiImg::insert([

				'product_id' => $product_id,
				'photo_name' => $uploadPath,
				'created_at' => Carbon::now(),

			]);

		}
		////////// End Multiple Image Upload Start ///////////
	}


}
