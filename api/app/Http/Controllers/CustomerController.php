<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::query()->withCount('orders')->get();

        return CustomerResource::collection($customers);
    }
}
