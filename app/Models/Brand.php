<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'logo','slug','status'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function storeBrand(Object $request)
    {
        $image = $request->file('logo');

        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalName());
        $image_full_name = $image_name . '' . $ext;
        $upload_path     = 'public/images/brands/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $this->logo      = $image_url;
        $this->name      = $request->name;
        $this->slug      = $request->slug;
        $this->status      = $request->status;
        $storeBrand      = $this->save();

        $storeBrand ?
            session()->flash('success', 'Brand Created Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
    public function updateBrand(Object $request, Int $id)
    {
        $brand = $this->findOrFail($id);
        $image = $request->file('logo');

        if ($image) {

            if (file_exists($brand->logo)) unlink($brand->logo);
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name . '' . $ext;
            $upload_path     = 'public/images/brands/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $brand->logo     = $image_url;
        }

        $brand->name     = $request->name;
        $updateBrand     = $brand->save();

        $updateBrand ?
            session()->flash('success', 'Brand Updated Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyBrand(Object $brand)
    {
        if (file_exists($brand->logo)) unlink($brand->logo);
        $destroyBrand = $brand->delete();

        $destroyBrand ?
            session()->flash('success', 'Brand Deleted Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
