<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public function index() {
        $packages = Package::with('services')->get(); // ambil sekaligus services
        return view('admin.packages.index', compact('packages'));
    }

    public function create() {
        $allServices = Service::all(); // untuk multi-select
        return view('admin.packages.create', compact('allServices'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        $package = Package::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? '',
            'price' => $validatedData['price'],
        ]);

        // Sync services
        $package->services()->sync($validatedData['services'] ?? []);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit($id) {
        $package = Package::with('services')->findOrFail($id);
        $allServices = Service::all();
        return view('admin.packages.edit', compact('package', 'allServices'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        $package = Package::findOrFail($id);
        $package->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? '',
            'price' => $validatedData['price'],
        ]);

        // Sync services
        $package->services()->sync($validatedData['services'] ?? []);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id) {
        $package = Package::findOrFail($id);
        $package->services()->detach(); // hapus relasi pivot dulu
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
