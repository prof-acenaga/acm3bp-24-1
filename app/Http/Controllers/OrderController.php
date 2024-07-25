<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\Casts\Json;

class OrderController extends Controller
{
    public function addProduct($id)
    {
        $product = Product::find($id);
        $user_id = auth()->id();
        $order = Order::where('user_id', $user_id)->where('status', 1)->first();
        if ($order){
            $products = collect(json_decode($order->products));

            // Check if product exists in the array and update its quantity
            foreach ($products as $item) {
                if ($item->id === $product->id) {
                    return redirect()->back()->with('status', 'el producto ya ha sido agregado');
                }
            }

            $products = json_encode($products->push($product));
            dd($order->id);
            $order->update([
                'products' => $products,
                'total' => $order->total + $product->price
            ]);
            $order->save();
        } else {
            $order = new Order;
            $order->user_id = $user_id;
            $order->products = json_encode([$product]);
            $order->total = $product->price;
            $order->status = 1;
            $order->save();
        }
        return redirect()->back()->with('status', 'Producto agregado con exito');
    }

    public function removeProduct($id)
    {
        $user_id = auth()->id();
        $order = Order::where('user_id', $user_id)->where('status', 1)->first();
        $products = collect(json_decode($order->products));
        $products = $products->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
        $order->update([
            'products' => json_encode($products),
            'total' => $order->total - Product::find($id)->price
        ]);
        return redirect()->back()->with('success', 'Producto eliminado con exito');
    }

    public function showCart()
    {
        $user_id = auth()->id();
        $order = Order::where('user_id', $user_id)->where('status', 1)->first();
        return view('cart', compact('order'));
    }
}
