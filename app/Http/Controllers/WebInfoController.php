<?php

namespace App\Http\Controllers;

use App\Models\WebInfo;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreWebInfoRequest;
use App\Http\Requests\UpdateWebInfoRequest;

class WebInfoController extends Controller
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
     * @param  \App\Http\Requests\StoreWebInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function show(WebInfo $webinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(WebInfo $webinfo)
    {
        return view('backend.admin.settings._webinfo',compact('webinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebInfoRequest  $request
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWebInfoRequest $request, WebInfo $webinfo)
    {
        $data = $request->validated();
        // Handle the logo file upload
        try {
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                unlink($webinfo->logo);
                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalName());
                $image_full_name = $image_name . '' . $ext;
                $upload_path     = 'public/images/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $data['logo']= $image_url;
            }

            // Handle the favicon file upload
            if ($request->hasFile('icon')) {
                $image = $request->file('icon');
                unlink($webinfo->icon);
                $image_name      = date('YmdHis');
                $ext             = strtolower($image->getClientOriginalName());
                $image_full_name = $image_name . '' . $ext;
                $upload_path     = 'public/images/';
                $image_url       = $upload_path . $image_full_name;
                $success         = $image->move($upload_path, $image_full_name);
                $data['icon']= $image_url;
            }
            $updatewebinfo = $webinfo->update($data);
            session()->flash('success', 'WebInfo Update Successfully!');
            Cache::forget('web_info');
            return back();

        } catch (\Throwable $th) {
            throw $th;
        }
        // $updatewebinfo ?
        //     session()->flash('success', 'WebInfo Update Successfully!') :
        //     session()->flash('error', 'Something Went Wrong!');
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebInfo  $webInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebInfo $webInfo)
    {
        //
    }
}
