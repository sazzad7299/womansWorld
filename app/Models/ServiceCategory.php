<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable = [
        'name','slug','parent_id','status','logo'
    ];

    public function service()
    {
        return $this->hasMany(Service::class,'category_id');
    }

    public static function hello($id)
    {
         $getParent = ServiceCategory::where('id',$id)->first();
         return $getParent->name;

    }
    public function isChild(): bool
    {
        return $this->parent_id !== null;
    }
    // public function parent(){
    //     return $this->hasOne(Category::class,'id','parent_id');
    // }
    public static function tree()
    {
       $allCategories =  ServiceCategory::with('parent')->get();
       $rootCategories = $allCategories->whereNull('parent_id');
        Self::formatTree($rootCategories,$allCategories);
       return $rootCategories;
    }
    public static function formatTree($categories, $allCategories){
        foreach($categories as $category){
            $category->children = $allCategories->where('parent_id',$category->id)->values();

            if($category->children->isNotEmpty()){
                Self::formatTree($category->children,$allCategories);
            }

        }
    }
/// for select
public static function getIndentedCategories($categories, $prefix = '') {
    $indentedCategories = [];

    foreach ($categories as $category) {
        $indentedCategories[$category->id] = $prefix . $category->name;

        if ($category->children->isNotEmpty()) {
            $indentedCategories += Self::getIndentedCategories($category->children, $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;');
        }
    }

    return $indentedCategories;
}

    public function parent()
    {
        return $this->belongsTo(ServiceCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }
    public function storeCategory(Object $request)
    {
        $data = $request->all();
        if($request->hasFile('logo')){
            $image = $request->file('logo');

        $image_name      = date('YmdHis');
        $ext             = strtolower($image->getClientOriginalName());
        $image_full_name = $image_name . '' . $ext;
        $upload_path     = 'public/images/categories/';
        $image_url       = $upload_path . $image_full_name;
        $success         = $image->move($upload_path, $image_full_name);
        $data['logo']= $image_url;
        }

        $storeCategory   = $this->fill($data)->save();

        $storeCategory ?
            session()->flash('success', 'Category Created Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function updateCategory(Object $request,Int $id)
    {
        $category = $this::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('logo')){
            unlink($category->logo);
            $image = $request->file('logo');
            $image_name      = date('YmdHis');
            $ext             = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name . '' . $ext;
            $upload_path     = 'public/images/categories/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
            $data['logo']= $image_url;
        }
        $updateCategory   = $category->fill($data)->save();

        $updateCategory ?
            session()->flash('success', 'Category Updated Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyCategory(Int $id)
    {
        $category = $this::findOrFail($id);
        if($category->logo){
            unlink($category->logo);
        }
        $deleteCategory = $category->delete();

        $deleteCategory ?
            session()->flash('success', 'Category Deleted Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
