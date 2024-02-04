<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $fillable=['title','content'];

    public function storeBranch(object $request, object $branch){
        try {
            $data = $request->all();
            $branch->fill($data)->save();
            Cache::forget('branch');
            session()->flash('success', 'New Branch Created Successfully!');
        } catch (\Throwable $th) {
            session()->flash('error', 'New Branch Created faild!');
        }
    }
    public function updateBranch(object $request, object $branch){
        try {
            $data = $request->all();
            $branch->fill($data)->save();
            Cache::forget('branch');
            session()->flash('success', 'Branch Update Successfully!');
        } catch (\Throwable $th) {
            session()->flash('error', 'Branch Update faild!');
        }
    }
    public function destroyBranch(object $branch){
        $branch->delete();
        Cache::forget('branch');
        session()->flash('success', 'Branch Deleted Successfully');
    }
}
