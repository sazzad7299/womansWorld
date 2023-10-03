<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShippingOptionRequest;
use App\Http\Requests\UpdateShippingOptionRequest;
use App\Models\ShippingOption;

class ShippingOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.settings._addShipping');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShippingOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShippingOptionRequest $request, ShippingOption $shippingoption)
    {
        $data = $request->all();
        $save = $shippingoption->fill($data)->save();
        $save
            ? session()->flash('success', 'Shipping Option Save Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingOption  $shippingOption
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingOption $shippingOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingOption  $shippingOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingOption $shippingoption)
    {
       $item = $shippingoption;
       return view('backend.admin.settings._editshipping',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShippingOptionRequest  $request
     * @param  \App\Models\ShippingOption  $shippingOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippingOptionRequest $request, ShippingOption $shippingoption)
    {
        $data = $request->all();
        $save = $shippingoption->fill($data)->update();
        $save
            ? session()->flash('success', 'Shipping Option Update Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingOption  $shippingOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingOption $shippingoption)
    {
        $delete = $shippingoption->delete();
        $delete
            ? session()->flash('success', 'Shipping Option Delete Successfully!')
            : session()->flash('error', 'Something Went Wrong!');
        return back();
    }
}
