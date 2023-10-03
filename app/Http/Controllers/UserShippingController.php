<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserShippingRequest;
use App\Http\Requests\UpdateUserShippingRequest;
use App\Models\UserShipping;

class UserShippingController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserShippingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserShippingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserShipping  $userShipping
     * @return \Illuminate\Http\Response
     */
    public function show(UserShipping $userShipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserShipping  $userShipping
     * @return \Illuminate\Http\Response
     */
    public function edit(UserShipping $userShipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserShippingRequest  $request
     * @param  \App\Models\UserShipping  $userShipping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserShippingRequest $request, UserShipping $userShipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserShipping  $userShipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserShipping $userShipping)
    {
        //
    }
}
