<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::get();
//        dd(session()->all());
        $order = Order::find(session('orderId'));
        return view('cart.index', compact('categories', 'order'));
    }

    public function cartAdd(Product $product)
    {
        if (Auth::check() && Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            session()->flash('warning','Необходимо авторизоваться');
            return back();
        }
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $params = ['user_id' => $user_id];
            $order = Order::create($params);
            session(['orderId' => $order->id]);
            session(['cartStatus' => 1]);
        } else {
            $order = Order::find($orderId);
            session(['cartStatus' => 1]);
        }

        if ($order->products->contains($product->id)) {
            $pivotProduct = $order->products()->where('product_id', $product->id)->first()->pivot;
            $pivotProduct->amount++;
            $pivotProduct->update();
        } else {
            $order->products()->attach($product, ['price' => $product->price]);
        }
        $cartItemsCount = $order->products()->count();
        session(['cartItems' => $cartItemsCount]);
        session()->flash('success','В корзину добавлено: '.$product->name);

        return back()->withInput();
    }

    public function cartRemove(Product $product)
    {
        if (Auth::check() && Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            session()->flash('warning', __('You need login'));
            return back();
        }
        $orderId = session('orderId');

        if(is_null($orderId)) {
            return back();
        }

        $order = Order::find($orderId);
        if ($order->products->contains($product->id)) {
            $pivotProduct = $order->products()->where('product_id', $product->id)->first()->pivot;
            if($pivotProduct->amount < 2) {
                $order->products()->detach($product);
            } else {
                $pivotProduct->amount--;
                $pivotProduct->update();
            }
        }
        if ($order->getTotalAmount() < 2) {
            session()->forget('cartStatus');
        }
        $cartItemsCount = $order->products()->count();
        session(['cartItems' => $cartItemsCount]);
        session()->flash('warning', 'Из корзины удалено: '.$product->name);
        return back();
    }
    public function test()
    {
        return back()->withInput();
    }
}
