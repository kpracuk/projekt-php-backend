<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\OrderStoreRequest;
use App\Http\Requests\Orders\OrderUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        if($request->user()->hasRole('admin')) {
            $orders = Order::with(['user', 'product'])->get();
        } else {
            $orders = $orders = Order::with(['user', 'product'])->where(['user_id' => $request->user()->id])->get();
        }
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderStoreRequest $request
     * @return JsonResponse
     */
    public function store(OrderStoreRequest $request)
    {
        $product = Product::find($request->get('product_id'));
        if($product->quantity < $request->get('quantity')) {
            abort(403, 'Quantity exceeded!');
        }
        $order = new Order();
        $order->user_id = Auth::id();
        $order->product_id = $product->id;
        $order->quantity = $request->get('quantity');
        $order->price_at_buy = $product->price;
        $order->status = 'placed';
        $order->save();
        $order->fresh();

        $new_order = Order::with(['user', 'product'])->find($order->id);

        return response()->json($new_order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderUpdateRequest $request
     * @param Order $order
     * @return JsonResponse
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();

        return response()->json($order);
    }
}
