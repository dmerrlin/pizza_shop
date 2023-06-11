<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(OrderRequest $request){
        $data = $request->validated();

        $order = Order::create([
            'products' => json_encode($data['products']),
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'total_price' => $data['total_price']
        ]);

        return new OrderResource($order);
    }
}
