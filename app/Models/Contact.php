<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'phone', 'facebook', 'twitter', 'instagram', 'address',
    ];

    public static $validateRule = [

        'email'     => 'required|email|max:255',
        'phone'     => 'required|string|max:15',
        'address'   => 'nullable|string',
        'facebook'  => 'nullable|string|max:255',
        'twitter'   => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'pinterest' => 'nullable|string|max:255',
    ];

    public function updateContact(Object $request, Object $contact)
    {
        $contact->email     = $request->email;
        $contact->phone     = $request->phone;
        $contact->facebook  = $request->facebook;
        $contact->twitter   = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->pinterest = $request->pinterest;
        $contact->address   = $request->address;
        $updateContact      = $contact->save();

        $updateContact ?
            session()->flash('success', 'Contact Updated Successfully!') :
            session()->flash('error', 'Something Went Wrong!');
    }
}
