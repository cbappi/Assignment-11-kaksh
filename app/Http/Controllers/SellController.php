<?php

namespace App\Http\Controllers;
use App\Http\Requests\SellStoreRequest;
use App\Models\Sell;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Get today's total amount
        $todayTotal = Sell::whereDate('sell_date', Carbon::today())->sum('sell_amount');

        // Get yesterday's total amount
        $yesterdayTotal = Sell::whereDate('sell_date', Carbon::yesterday())->sum('sell_amount');

        // Get this month's total amount
        $thisMonthTotal = Sell::whereYear('sell_date', Carbon::now()->year)
            ->whereMonth('sell_date', Carbon::now()->month)
            ->sum('sell_amount');

        // Get last month's total amount
        $lastMonthTotal = Sell::whereYear('sell_date', Carbon::now()->subMonth()->year)
            ->whereMonth('sell_date', Carbon::now()->subMonth()->month)
            ->sum('sell_amount');

        return view('sell.index', compact('todayTotal', 'yesterdayTotal', 'thisMonthTotal', 'lastMonthTotal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get(['id', 'product_name','unit_price', 'quantity']);

        return view('sell.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SellStoreRequest $request)
    {

         // dd($request->all());

        Sell::create([

            'sell_date' => $request->sell_date,
            'product_id' => $request->product_id,

            'unit_price' => $request->unit_price,
            'sell_qty' => $request->sell_qty,
            //$request->sell_amount = $request->sell_qty * 600;
            $totalAmount = $request->unit_price * $request->sell_qty,


            //$product->total_amount = $totalAmount;
            'sell_amount' => $totalAmount,

            ]);

            Session::flash('status', 'Sell created successfully!');
            return back();




            // Other logic...

            return redirect()->route('sell.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
