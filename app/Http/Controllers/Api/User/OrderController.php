<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\OrderRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function __invoke(OrderRequest $request)
    {
        try {
            $data = $request->validated();
            Order::create($data);
    
            Log::info('Order created:', $data);
    
            return response()->json(['message' => 'Заказ успешно оформлен']);
        } catch (\Exception $e) {
            Log::error('Failed to create order:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Не удалось создать заказ'], 500);
        }
    }

    public function getOrderByUser($id)
    {
        $orders = Order::where('user_id', $id)->get();

        foreach ($orders as $order) {
            $order['pizzaz']=json_decode($order['pizzaz'], true);
        }

        return response()->json($orders);
    }
}
