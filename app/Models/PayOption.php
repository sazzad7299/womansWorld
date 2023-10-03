<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayOption extends Model
{
    use HasFactory;
    protected $table ='pay_options';

    protected $fillable = [
        'name', 'type', 'account', 'status',
    ];
}
