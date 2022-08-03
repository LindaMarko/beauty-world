<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }
}
