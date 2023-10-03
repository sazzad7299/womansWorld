<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static $validateRule = [
        'name' => 'required|string|max:255',
    ];

    public function storeSize(Object $request)
    {
        $this->name = $request->name;
        $storeSize = $this->save();

        $storeSize ?
            session()->flash('success', 'Size Save Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function updateSize(Object $request, Int $id)
    {
        $size = $this::findOrFail($id);
        $size->name = $request->name;
        $updateSize = $size->save();

        $updateSize ?
            session()->flash('success', 'Size Update Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function destroySize(Int $id)
    {
        $size = $this::findOrFail($id);
        $deleteSize = $size->delete();

        $deleteSize ?
            session()->flash('success', 'Size Delete Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
