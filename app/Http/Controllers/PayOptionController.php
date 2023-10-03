<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayOptionRequest;
use App\Models\PayOption;
use Illuminate\Http\Request;

class PayOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payoptions = PayOption::query()->get();
        return view('backend.admin.settings._paymentoptions',compact('payoptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.settings._addPaymentOption');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayOptionRequest $request,PayOption $payoption)
    {
        $data = $request->all();
       $save = $payoption->fill($data)->save();
       $save
            ? session()->flash('success', 'Payment Option Save Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayOption  $payOption
     * @return \Illuminate\Http\Response
     */
    public function show(PayOption $payOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayOption  $payOption
     * @return \Illuminate\Http\Response
     */
    public function edit(PayOption $payoption)
    {
        return view('backend.admin.settings._editpayoption',compact('payoption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayOption  $payOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayOption $payoption)
    {
        $data = $request->all();
        $save = $payoption->fill($data)->update();
        $save
            ? session()->flash('success', 'Payment Option Save Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayOption  $payOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayOption $payoption)
    {
       $paymentDelete = $payoption->delete();
        $paymentDelete
            ? session()->flash('success', 'Payment Option Deleted Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
        return back();
    }
}
