<?php

namespace App\Http\Controllers;


use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('services')->get(); // ambil semua paket beserta service-nya
        return view('guest.sections.packages', compact('packages'));
    }
}
