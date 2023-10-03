<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRequest extends Model
{
    use HasFactory;

    protected $table = "product_requests";
    protected $fillable = ['name','user_id','image','quantity','message','status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function storeProduct($request,$user_id)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name . '' . $ext;
            $upload_path     = 'public/images/requestedproduct/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $data['image']= $image_url;
        }
        $data['user_id'] = $user_id;
        $storeRequest   = $this->fill($data)->save();
        return response()->json(['message' => 'Product Request submitted successfully']);

    }
}
