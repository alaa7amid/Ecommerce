<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\prodect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    
    public function addToCart(Request $request){
        $prodect_id = $request->prodect_id;
        $qty = $request->quantity;
        $user_id = Auth::id();
 
        if(Auth::check()){
 
            $prodect =prodect::where('id',$prodect_id)->exists();
            if($prodect){
 
                if (Cart::where('prodect_id',$prodect_id)->where('user_id',$user_id)->exists()){
                    return response()->json(['msg'=>'product in your cart already']);
 
 
                }else{
                    Cart::create([
                        'user_id'=>$user_id,
                        'prodect_id'=>$prodect_id,
                        'qty'=>$qty
                    ]);
 
                    $prodect_name = prodect::findOrFail($prodect_id);
                    return response()->json(['msg'=>$prodect_name->name ." successfully added to your cart"]);
                }
 
            }else{
                return response()->json(['msg'=>'product not found']);
            }
 
        }else{
            return response()->json(['msg'=>'login first']);
        }
     }
 
}
