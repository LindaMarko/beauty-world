<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function index()
    {

        $products = Product::where('status', 1)
        ->inRandomOrder()
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])->limit(6)->get();

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)
        ->orderBy('brand','ASC')
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])
        ->limit(3)->get();

        $special_deals = Product::where('special_deals',1)
        ->inRandomOrder()
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])
        ->limit(3)->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->
        where('product_type', strtolower($skip_category_1->category_name_en) )
        ->orderBy('id','DESC')
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])->get();

        $skip_brand_19 = Brand::skip(19)->first();
    	$skip_brand_product_19 = Product::where('status',1)->where('brand', strtolower($skip_brand_19->brand_name_en))->orderBy('id','ASC')->where('price', '!=', '0.0' )->get();

        return view('frontend.index', compact('categories', 'sliders', 'products',
                     'special_offer', 'special_deals','skip_category_1','skip_product_1','skip_brand_19','skip_brand_product_19' ));
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        return redirect()->route('dashboard');
    }

    public function UserChangePassword()
    {
        return view('frontend.profile.change_password');
    }

    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = User::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            return redirect()->route('user.logout');
        }else {
            return redirect()->back();
        }

    }

    public function ProductDetails($id, $slug)
    {
		$product = Product::findOrFail($id);
        $multiImag = MultiImg::where('product_id',$id)->get();
        $cat_name = $product->product_type;
		$relatedProducts = Product::where('product_type',strtolower($cat_name))
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])
        ->limit(12)
        ->inRandomOrder()->get();
        return view('frontend.product.product_details',compact('product','multiImag','relatedProducts', 'cat_name'));

	}

    public function TagWiseProduct($tag)
    {
        $productsWithTags = Product::whereNotNull('product_tags_en')
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])
        ->get();
        $productsWithClickedTag = array();
        foreach( $productsWithTags as $product) {
            for($i = 0; $i < count($product->product_tags_en); ++$i) {
                if(in_array($tag, $product->product_tags_en )) {
                    if(!in_array($product, $productsWithClickedTag)) {
                        array_push($productsWithClickedTag, $product);
                    }

                }
            }
        }

		// $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_sv',$tag)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
		return view('frontend.tags.tags_view',compact('productsWithClickedTag','categories', 'tag'));

	}

    // Category wise data
	public function CatWiseProducts(Request $request, $cat_name)
    {
		$products = Product::where('status',1)
        ->where('product_type',strtolower($cat_name))
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])
        ->orderBy('id','ASC')
        ->paginate(18);
		$categories = Category::orderBy('category_name_en','ASC')->get();
        $breadcrumbcat = Category::where('category_name_en',$cat_name)->get();

        ///  Load More Product with Ajax
		if ($request->ajax()) {
            $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();
            $list_view = view('frontend.product.list_view_product',compact('products'))->render();

            return response()->json(['grid_view' => $grid_view,'list_view'=> $list_view]);
        }
        ///  End Load More Product with Ajax

		return view('frontend.product.category_view',compact('products','categories', 'breadcrumbcat'));

	}

    // Brand wise data
	public function BrandWiseProducts(Request $request, $brand_name)
    {
		$products = Product::where('status',1)
        ->where('brand',strtolower($brand_name))
        ->where('price', '!=', '0.0' )
        ->orderBy('id','ASC')->paginate(18);
		$categories = Category::orderBy('category_name_en','ASC')->get();
        $breadcrumbcat = Brand::where('brand_name_en', ucfirst($brand_name))->get();

        ///  Load More Product with Ajax
		if ($request->ajax()) {
            $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();
            $list_view = view('frontend.product.list_view_product',compact('products'))->render();

            return response()->json(['grid_view' => $grid_view,'list_view'=> $list_view]);
        }
        ///  End Load More Product with Ajax

		return view('frontend.product.brand_view',compact('products','categories', 'breadcrumbcat'));

	}

    /// Product Modal View With Ajax
	public function ProductViewAjax($id)
    {
		$product = Product::findOrFail($id);

		// $color = $product->product_color_en;
		// $product_color = explode(',', $color);

		return response()->json(array(
			'product' => $product,
			// 'color' => $product_color,
		));
	}

    // Product Seach
	public function ProductSearch(Request $request)
    {
        $request->validate(["search" => "required"]);
		$item = $request->search;
        $categories = Category::orderBy('category_name_en','ASC')->get();

		$products = Product::where('product_name_en','LIKE',"%$item%")
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])->get();

		return view('frontend.product.search',compact('products','categories', 'item'));

	}

    // Advance Search Options
	public function SearchProduct(Request $request)
    {
        $request->validate(["search" => "required"]);
		$item = $request->search;
		$products = Product::where('product_name_en','LIKE',"%$item%")
        ->where([
            ['price', '!=', '0.0'],
            ['brand', '!=', 'benefit'],
            ['brand', '!=', 'glossier'],
            ['brand', '!=', 'deciem'],
        ])
        ->select('product_name_en','image_link', 'price', 'id','product_slug_en')
        ->limit(5)->get();

		return view('frontend.product.search_product',compact('products'));

	}

}
