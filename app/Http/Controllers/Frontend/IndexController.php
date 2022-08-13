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
        $products = Product::where('status', 1)->orderBy('id','DESC')->limit(6)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $featured = Product::where('featured',1)->orderBy('product_name_en','ASC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)->orderBy('price','DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('brand','ASC')->limit(3)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('product_type', strtolower($skip_category_1->category_name_en) )->orderBy('id','DESC')->get();

        $skip_brand_19 = Brand::skip(19)->first();
    	$skip_brand_product_19 = Product::where('status',1)->where('brand', strtolower($skip_brand_19->brand_name_en))->orderBy('id','ASC')->get();

        return view('frontend.index', compact('categories', 'sliders', 'products',
                'featured', 'hot_deals', 'special_offer', 'special_deals','skip_category_1','skip_product_1','skip_brand_19','skip_brand_product_19' ));
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
        return view('frontend.product.product_details',compact('product','multiImag'));

	}

    public function TagWiseProduct($tag)
    {
		$products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_sv',$tag)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));


	}
}
