<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'user_id', 'product_id', 'size', 'color', 'price', 'quantity', 'total', 'order_date_time', 'delivered_date_time', 'status',
    ];
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
