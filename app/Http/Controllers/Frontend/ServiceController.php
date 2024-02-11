<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function getServices($slug){
        $category = Category::where('slug', $slug)->first();
        $services = Service::where('category_id',$category->id)->with('photos:id,service_id,photo')->get();
        // return $services;
        return view('frontend.pages.service', compact('services'));
    }
}
