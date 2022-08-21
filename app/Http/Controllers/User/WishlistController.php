<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
                ]);

                return response()->json(['success' => 'Successfully Added To Your Wishlist']);

            }else{
                return response()->json(['error' => "You've already added this product to Your Wishlist"]);
            }

        }else{

            return response()->json(['error' => 'To access your Wishlist you need to login first']);
        }
    }

    public function ViewWishlist()
    {
		return view('frontend.wishlist.wishlist_view');
	}

    public function GetWishlistProduct()
    {
		$wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		return response()->json($wishlist);
	}

    public function RemoveWishlistProduct($id)
    {
		Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully removed from Wishlist']);
	}
}
