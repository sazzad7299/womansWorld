<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserShipping extends Model
{
    use HasFactory;
    protected $table ='user_shippings';

    protected $fillable =['name','address','city','thana','phone','user_id','apartment','zip'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function insertOrUpdate($shippingdata)
    {
        $shipping = self::updateOrCreate(['user_id' => $shippingdata['user_id']], $shippingdata);
        return $shipping;
    }
}
