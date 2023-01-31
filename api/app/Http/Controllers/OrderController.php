<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query()->with(['customer', 'album'])->get();

        return OrderResource::collection($orders);
    }
}
