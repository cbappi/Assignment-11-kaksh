<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'sell_date', 'sell_qty','unit_price','sell_amount'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
