<?php

namespace App\Models;

use App\Constant\Constant;
use App\Models\Brand;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\ProductPhoto;
use App\Models\ProductSize;
use App\Models\Review;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'price',
        'old_price',
        'discount_percent',
        'discount',
        'tags',
        'description',
        'display',
        'featured',
        'p_set',
        'new',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function size()
    {
        return $this->hasManyThrough(
            Size::class,
            ProductSize::class,
            'product_id',
            'id',
            'id',
            'size_id'
        );
    }
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withDefault();
    }
    public function colors()
    {
        return $this->hasManyThrough(
            Color::class,
            ColorProduct::class,
            'product_id',
            'id',
            'id',
            'color_id'
        );
    }

    const Status = [
        'Inactive' => 0,
        'Active' => 1,
        'Pending' => 2,
        'Review' => 3,

    ];

    protected $appends = ['product_status'];

    protected function getProductStatusAttribute(): string
    {
        return Constant::PRODUCT_STATUS[$this->attributes['status']];
    }
    public function storeProduct(object $request)
    {
        try {
            DB::beginTransaction();
            $image = $request->file('display');

            if ($image) {

                $image_name = date('YmdHis');
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/images/products/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                $this->display = $image_url;
            }

            $this->category_id = $request->category_id;
            $this->brand_id = $request->brand_id;
            $this->name = $request->name;
            $this->slug = $request->slug;
            $this->price = $request->price;
            $this->stock = $request->stock;
            $this->old_price = $request->old_price;
            $this->discount_type = $request->discount_type;
            $this->discount = $request->discount;
            $this->tags = $request->tags;
            $this->featured = $request->featured;
            $this->new = $request->new;
            $this->p_set = $request->p_set;
            $this->description = $request->description;
            $storeProduct = $this->save();
            $product_id = $this->id;

            if ($request->sizes != null) {

                foreach ($request->sizes as $key => $value) {
                    $size_data[] = [
                        'product_id' => $product_id,
                        'size_id' => $value,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }
                ProductSize::insert($size_data);
            }

            if ($request->colors != null) {

                foreach ($request->colors as $key => $value) {
                    $color_data[] = [
                        'product_id' => $product_id,
                        'color_id' => $value,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }

                ColorProduct::insert($color_data);
            }

            if ($files = $request->file('photo')) {

                foreach ($files as $file) {

                    $multiple_upload_path = 'public/images/products/';
                    $name = $file->getClientOriginalName();
                    $multiple_image_name = date('YmdHis') . '_' . $name;
                    $file->move($multiple_upload_path, $multiple_image_name);

                    //     $productPhoto             = new ProductPhoto();
                    //     $productPhoto->photo      = $multiple_upload_path . $multiple_image_name;
                    //     $productPhoto->product_id = $product_id;
                    //     $productPhoto->save();
                    // }
                    $photo_data[] = [
                        'product_id' => $product_id,
                        'photo' => $multiple_upload_path . $multiple_image_name,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }

                ProductPhoto::insert($photo_data);
            }
            DB::commit();
            session()->flash('success', 'New Product Created Successfully!');

        } catch (\Throwable$th) {
            DB::rollBack();
            session()->flash('error', 'Something Went Wrong!');
        }
    }

    public function updateProduct(object $request, object $product)
    {
        $image = $request->file('display');

        if ($image) {
            if (file_exists($product->display)) {
                unlink($product->display);
            }

            $image_name = date('YmdHis');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/images/products/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $product->display = $image_url;
        }

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->old_price = $request->old_price;
        $product->discount_type = $request->discount_type;
        $product->discount = $request->discount;
        $product->tags = $request->tags;
        $product->featured = $request->featured;
        $product->new = $request->new;
        $product->p_set = $request->p_set;
        $product->status = $request->status;
        $product->description = $request->description;
        $updateProduct = $product->save();
        $product_id = $product->id;

        ProductSize::where('product_id', $product->id)->delete();
        ColorProduct::where('product_id', $product->id)->delete();

        if ($request->sizes != null) {
            foreach ($request->sizes as $key => $value) {
                $size_data[] = [
                    'product_id' => $product_id,
                    'size_id' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
            ProductSize::insert($size_data);
        }

        if ($request->colors != null) {
            foreach ($request->colors as $key => $value) {
                $color_data[] = [
                    'product_id' => $product_id,
                    'color_id' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            ColorProduct::insert($color_data);
        }

        if ($files = $request->file('photo')) {

            foreach ($files as $file) {

                $multiple_upload_path = 'public/images/products/';
                $name = $file->getClientOriginalName();
                $multiple_image_name = date('YmdHis') . '_' . $name;
                $file->move($multiple_upload_path, $multiple_image_name);

                $photo_data[] = [
                    'product_id' => $product_id,
                    'photo' => $multiple_upload_path . $multiple_image_name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            ProductPhoto::insert($photo_data);
        }

        $updateProduct
        ? session()->flash('success', 'Product Updated Successfully!')
        : session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyProduct(object $product)
    {
        if (file_exists($product->display)) {
            unlink($product->display);
        }

        $photos = ProductPhoto::where('product_id', $product->id)->get();

        foreach ($photos as $key => $value) {
            if (file_exists($value->photo)) {
                unlink($value->photo);
            }

        }

        ProductSize::where('product_id', $product->id)->delete();
        ColorProduct::where('product_id', $product->id)->delete();
        $destroyProduct = $product->delete();
        $destroyProduct
        ? session()->flash('success', 'Product Deleted Successfully!')
        : session()->flash('error', 'Something Went Wrong!');
    }
}
