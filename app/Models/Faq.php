<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'answer',
    ];

    public static $validateRule = [
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
    ];

    public function storeFaq(Object $request)
    {
        $this->question = $request->question;
        $this->answer  = $request->answer;
        $storeFaq    = $this->save();

        $storeFaq ?
            session()->flash('success', 'Faq Created Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function updateFaq(Object $request, Int $id)
    {
        $faq = $this::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer  = $request->answer;
        $updateFaq  = $faq->save();

        $updateFaq ?
            session()->flash('success', 'Faq Updated Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }

    public function destroyFaq(Int $id)
    {
        $faq = $this::findOrFail($id);
        $deleteFaq = $faq->delete();

        $deleteFaq ?
            session()->flash('success', 'Faq Deleted Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
