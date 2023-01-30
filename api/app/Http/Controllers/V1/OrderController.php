<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Album;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $items = $request->input('items');
        $album = Album::byHash($items['album_id']);

        if ($album->stock === 0) {
            return response()->json(['message' => 'Fora de estoque'], 422);
        }

        try {
            DB::beginTransaction();

            $customer = Customer::firstOrNew(
                ['email' => $request->input('email')],
                $request->only(['name', 'email', 'phone', 'address'])
            );
            $customer->card_last_digits = mb_substr($request->input('card'), -4);
            $customer->card_expires_at = $request->input('expires_at');
            $customer->save();

            $order = Order::create([
                'customer_id'  => $customer->id,
                'album_id'     => $album->id,
                'quantity'     => $items['quantity'],
                'delivery_fee' => $items['delivery_fee'],
                'total_cost'   => ($album->price * $items['quantity']) + $items['delivery_fee'],
            ]);

            $album->stock -= $items['quantity'];
            $album->save();

            DB::commit();

            return OrderResource::make($order->load(['customer', 'album']));
        } catch (\Throwable $th) {
            DB::rollBack();

            return abort(500, $th->getMessage());
        }
    }
}
