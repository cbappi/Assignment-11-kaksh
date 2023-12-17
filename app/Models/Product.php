<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'product_name', 'unit_price','quantity', 'total_amount'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function sell()
    // {
    //     return $this->belongsTo(Sell::class);
    // }
}
