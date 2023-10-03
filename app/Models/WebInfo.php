<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebInfo extends Model
{
    use HasFactory;
    protected $table = "web_infos";
    protected $fillable = [
        'logo',
        'icon',
        'name',
        'title',
        'about',
        'address',
        'email',
        'number',
    ];
}
