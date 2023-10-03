<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = ['title', 'code', 'description', 'amount_type', 'type', 'status', 'expires_at', 'limit', 'amount'];
}
