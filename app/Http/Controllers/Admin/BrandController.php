<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    private $brandObject;

    public function __construct()
    {
        $this->brandObject = new Brand();
    }

    public function index()
    {
        $brands = Brand::orderBy('name', 'asc')->select('id', 'name', 'logo','slug')->get();
        return view('backend.admin.brand', compact('brands'));
    }

    public function store(BrandRequest $request)
    {
        $this->brandObject->storeBrand($request);
        return back();
    }

    public function update(BrandRequest $request, $id)
    {
        $this->brandObject->updateBrand($request, $request->id);
        return redirect()->route('admin.brands.index');
    }

    public function destroy(Brand $brand)
    {
        $this->brandObject->destroyBrand($brand);
        return back();
    }
}
