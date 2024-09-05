<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart(Request $req, $product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();

        if (!$product) {
            abort(404);
        } else {
            $exist_order = Order::where([
                ['user_id', Auth::id()],
                ['isOrdered', false],
            ])->first();

            if ($exist_order) {
                //if order is already exist then what?
                $exist_order_item = OrderItem::where([
                    ['user_id', Auth::id()],
                    ['isOrdered', false],
                    ['order_id', $exist_order->id],
                    ['product_id', $product->id]
                ])->first();

                if ($exist_order_item) {
                    $exist_order_item->qty += 1;
                    $exist_order_item->save();
                } else {
                    $order_item = new OrderItem();
                    $order_item->user_id = Auth::id();
                    $order_item->order_id = $exist_order->id;
                    $order_item->product_id = $product->id;
                    $order_item->save();
                }
            } else {
                $order = new Order();
                $order->user_id = Auth::id();
                $order->save();

                //inserting new order item order item 
                $order_item = new OrderItem();
                $order_item->user_id = Auth::user();
                $order_item->order_id = $order->id;
                $order_item->product_id = $product->id;

                $order_item->save();
            }
        }
        return redirect()->route('cart');
    }
    public function removeFromCart(Request $req, $product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();

        if (!$product) {
            abort(404);
        } else {
            $exist_order = Order::where([
                ['user_id', Auth::id()],
                ['isOrdered', false],
            ])->first();

            if ($exist_order) {
                //if order is already exist then what?
                $exist_order_item = OrderItem::where([
                    ['user_id', Auth::id()],
                    ['isOrdered', false],
                    ['order_id', $exist_order->id],
                    ['product_id', $product->id]
                ])->first();

                if ($exist_order_item) {
                    if ($exist_order_item->qty > 1) {
                        $exist_order_item->qty -= 1;
                        $exist_order_item->save();
                    } else {
                        $exist_order_item->delete();
                    }
                }
            } else {
                $order = new Order();
                $order->user_id = Auth::id();
                $order->save();

                //inserting new order item order item 
                $order_item = new OrderItem();
                $order_item->user_id = Auth::user();
                $order_item->order_id = $order->id;
                $order_item->product_id = $product->id;

                $order_item->save();
            }
        }
        return redirect()->route('cart');
    }
    public function showCart()
    {
        $data['order'] = Order::where('user_id', Auth::id())->where('isOrdered', false)->first();
        return view('cart', $data);
    }
}
