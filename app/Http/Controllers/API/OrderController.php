<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;
use App\Rules\BasketRule;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(OrderRequest $request){
        $data = $request->validated();
        $request->validate([
            'products' => [
                'required',
                'array',
                new BasketRule($data['total_price'])]
        ]);

        $order = Order::create([
            'products' => json_encode($request['products']),
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'total_price' => $data['total_price']
        ]);

        return new OrderResource($order);
    }
}
