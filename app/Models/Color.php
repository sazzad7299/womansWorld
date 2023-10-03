<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static $validateRule = [
        'name' => 'required|string|max:255',
    ];

    public function storeColor(Object $request)
    {
        $this->name = $request->name;
        $storeColor = $this->save();

        $storeColor ?
            session()->flash('success', 'Color Save Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function updateColor(Object $request, Int $id)
    {
        $color = $this::findOrFail($id);
        $color->name = $request->name;
        $updateColor = $color->save();

        $updateColor ?
            session()->flash('success', 'Color Update Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyColor(Int $id)
    {
        $color = $this::findOrFail($id);
        $deleteColor = $color->delete();

        $deleteColor ?
            session()->flash('success', 'Color Delete Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
