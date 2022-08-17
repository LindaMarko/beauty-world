<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

    	$product = Product::findOrFail($id);

    	if ($product->discount_price == NULL) {
    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->price,
    			'options' => [
    				'image' => $product->image_link,
    				// 'color' => $request->color,
    			],
    		]);

    		return response()->json(['success' => 'Successfully Added to Your Cart']);

    	}else{

    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->discount_price,
    			'options' => [
    				'image' => $product->image_link,
    				// 'color' => $request->color,
    			],
    		]);

    		return response()->json(['success' => 'Successfully Added to Your Cart']);
    	}

    }

    // Mini Cart Section

    public function AddMiniCart()
    {
    	$cartItems = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'cartItems' => $cartItems,
    		'cartQty' => $cartQty,
    		'cartTotal' => round($cartTotal),

    	));
    }

    // Remove product from mini cart
    public function RemoveMiniCart($rowId)
    {
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Product Remove from Cart']);

    }
}
