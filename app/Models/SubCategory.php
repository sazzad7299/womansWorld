<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id',
    ];

    public static $validateRule = [

        'name' => 'required|string|max: 255',
        'category_id' => 'required|numeric|min:1',
    ];

    public function getSubCategoriesWithCategory()
    {
        $subCategories = $this::join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.name as category')
            ->orderBy('sub_categories.name', 'asc')
            ->orderBy('categories.name', 'asc')
            ->get();
        return $subCategories;
    }

    public function storeSubCategory(Object $request)
    {
        $this->name        = $request->name;
        $this->category_id = $request->category_id;
        $storeSubCategory  = $this->save();

        $storeSubCategory ?
            session()->flash('success', 'Sub Category Created Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function updateSubCategory(Object $request, Object $category)
    {
        $category->name        = $request->name;
        $category->category_id = $request->category_id;
        $updateSubCategory     = $category->save();

        $updateSubCategory ?
            session()->flash('success', 'Sub Category Updated Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function destroySubCategory(Object $category)
    {
        $deleteSubCategory = $category->delete();

        $deleteSubCategory ?
            session()->flash('success', 'Sub Category Deleted Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
