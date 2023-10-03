<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_id', 'product_id',
    ];
    public function productSize()
    {
        return $this->belongsTo(Size::class,'size_id');
    }
}
