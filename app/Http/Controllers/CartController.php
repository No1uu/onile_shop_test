<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;






class CartController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => ['integer', 'min:1'],
        ]);

        $quantity = $validated['quantity'] ?? 1;

        $product = Product::findOrFail($validated['product_id']);

        if($product->stock < $quantity) {
            return back()->with('error','Үлдэгдэл хүрэлцэхгүй байна');
        }

        $cart = $request->session()->get('cart',[]);

        if(isset($cart[$product->id])){
            $newQty =$cart[$product->id]['quantity'] + $quantity;
            if($product->stock < $newQty){
                return back()->with('error','Үлдэгдэл хүрэлцэхгүй байна');
            }
            $cart[$product->id]['quantity'] = $newQty;
        }
        else{
            $cart[$product->id] =[
                'name' => $product->name,
                'price'=>(float)$product->price,
                'quantity'=> $quantity,
                'image'=> $product->image,
            ];
        }
        $request->session()->put('cart', $cart);
        
        return back()->with('success','Сагсанд нэмэгдлээ');

    }
    public function show(Request $request)
    {   
        $sessionCart = $request->session()->get('cart',[]);

        if(empty($sessionCart)){
            return redirect()->back()->with('error','Таны сагс хоосон байна');
        }   

        $alreadyCreated = Cart::where('user_id' , Auth::id('bb6539206@gmail.com'))
            ->where('status' , 'active')
            ->first();

        if($alreadyCreated){

            $cart = $alreadyCreated;
        }
        else
        {
             $cart = Cart::create([
            'user_id' => Auth::user()->id,
            'status' => 'active',
        ]);
        }


        foreach($sessionCart as $productId => $item)
        {
            CartItem::updateOrCreate(
                ['cart_id' => $cart->id,'product_id' => $productId,],
                [
                    'quantity' => $item['quantity'],
                    'unit_price' => (float)$item['price'],
                ]
            );
        }

        return redirect()->route('user.checkout',['id' => $cart->id]);

    }
    public function remove(Request $request)
    {   
        $validated = $request->validate([
            'product_id' => 'required',
        ]);

        $cart = $request->session()->get('cart',[]);

        unset($cart[$validated['product_id']]);

        $request->session()->put('cart', $cart);

        $user_id = Auth::user()->id;

        $cart = Cart::where('user_id' , $user_id)
        ->where('status' , 'active')
        ->first();

        if($cart){
            $cartItem = CartItem::where('cart_id' , $cart->id)
            ->where('product_id' , $validated['product_id'])
            ->first();

            if($cartItem){
                $cartItem->delete();
            }
        }
        return redirect()->back()->with('success','Амжилттай устгагдлаа');
    }
    public function clear(Request $request)
    {
        $request->session()->forget('cart');
        
        $user_id = Auth::user()->id;

        $cart = Cart::where('user_id' , $user_id)
        ->where('status' , 'active')
        ->first();

        if($cart){
            $cart->delete();
            $cart->save();
        }
        return redirect()->back()->with('success','Хоослогдлоо');
    }

    public function history()
    {
        $user_id = Auth::user()->id;

        $orders = Order::where('user_id' , $user_id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('cart.history', compact('orders'));
    }
    public function increase($id){

        $item = CartItem::findOrFail($id);

        $item->increment('quantity');

        return response()->json(['success' => true, 'quantity' => $item-> quantity ]);
    }
    public function decrease($id){

        $item = CartItem::findOrFail($id);

        $item->decrement('quantity');

        if($item->quantity <= 0){

            $item->update(['quantity' => 0]);
        }

        return response()->json(['success' => true, 'quantity' => $item-> quantity ]);
    }


}
