<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Post;

class OrderController extends Controller
{
    public function addProduct($id)
    {
        $user_id = auth()->id();
        $product = Post::find($id);
        $order = Order::where('user_id', $user_id)->get();
        if ($order->contains('product_id', $product->id)) {

        } else {

        }
        Order::where('user_id', $user_id);
        return redirect()->back()->with('success', 'Producto agregado conb exito');
    }
}
