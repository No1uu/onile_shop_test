<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;



class OrderController extends Controller
{
   public function index()
   {
    $orders = Order::Latest()->get();
    
    return view('admin.order.index', compact('orders'));
   }
   public function show($id)
   {
    $order = Order::findOrFail($id);

    $items = $order->cart->items;

    // dd($items);

    return view('admin.order.show', compact('order', 'items'));

   }
   public function paid($id)
   {
    $order = Order::findOrFail($id);

    $order->update(['status' => 'paid']);

    return redirect()->back()->with('success','Захиалгийн төлөв өөрчлөгдлөө');
   }
   public function unpaid($id)
   {
    $order = Order::findOrFail($id);

    $order->update(['status' => 'unpaid']);

    return redirect()->back()->with('success','Захиалгийн төлөв өөрчлөгдлөө');
   }
}
