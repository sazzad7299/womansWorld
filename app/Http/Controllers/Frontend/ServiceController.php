<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request){
        return view('backend.admin.services.index');
    }
    public function store(Request $request)
    {
        $serviceObject = new Service();
        $request->validate(Service::$validateRule);
        $serviceObject->storeService($request);
        return back();
    }
}
