<?php

namespace App\Http\Controllers\Store;

use App\Http\Requests\Order\OrderRequest;
use App\Models\ApiResponse;
use App\Models\Order;
use App\Models\Pet;

class StoreController
{
    public function create()
    {
        return view("store.create")->with("pet", Pet::all());
    }

    public function storage(OrderRequest $request)
    {
        Order::create([
            'pet_id' => $request->get("pet_id"),
            'quantity' => $request->get("quantity"),
            'status' => 'placed',
            'ship_date' => Now(),
            'complete' => true
        ]);
        ApiResponse::create([
            'code' => '200',
            'type' => 'unknown',
            'message' => 'Order was added'
        ]);
        return redirect()->route("store.create")->with("success", 'Order was create');
    }

    public function destroy(string $id)
    {
        $order_info = Order::where('id', $id)->first();
        if(!empty($order_info))
        {
            $order_info->delete();
            ApiResponse::create([
                'code' => '200',
                'type' => 'unknown',
                'message' => 'Order was delete'
            ]);
            return redirect()->route("index")->with('success', 'Order was deleted');
        } else {
            ApiResponse::create([
                'code' => '404',
                'type' => 'unknown',
                'message' => 'Order not found'
            ]);
            return redirect()->route("index")->with('errors', 'such pet does not exist');
        }
    }

    public function show($id)
    {
        return view("store.show")->with("order", Order::where("id", $id)->first());
    }
}
