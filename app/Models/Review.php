<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'rating','body', 'status',
    ];
    public function user(){
        return $this->belongsTo(User::class,)->withDefault();
      }

      public function product(){
        return $this->belongsTo(Product::class)->withDefault();
      }
}
