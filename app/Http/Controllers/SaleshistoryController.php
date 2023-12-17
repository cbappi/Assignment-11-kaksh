<?php

namespace App\Http\Controllers;
use App\Models\Sell;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleshistoryController extends Controller
{
    public function sellshistory()
    {
        $product = Product::get(['id','product_name']);
        $sells = Sell::get(['id','product_id','sell_date','sell_qty','sell_amount']);

        // return $subcategories;
        return view('sell.sellshistory', compact('sells','product'));
    }
}
