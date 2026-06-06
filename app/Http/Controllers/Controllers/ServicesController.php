<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
class ServicesController extends Controller
{
public function index(Request $request)
{
    $query = Service::query();

    // SEARCH
    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
    }

    $services = $query->latest()->paginate(10);

    return view('backend.pages.service.index', compact('services'));
}
    public function create(){
        return view('backend.pages.service.create');
    }
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
    ]);

    $iconPath = null;

    if ($request->hasFile('icon')) {
        $iconPath = $request->file('icon')->store('service_icons', 'public');
    }

    Service::create([
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $iconPath,
    ]);

    return redirect()->route('service.index')
        ->with('success', 'Service created successfully!');
}
    public function edit($id){
        $service = Service::findOrFail($id);
        return view('backend.pages.service.edit', compact('service'));     
    }
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
    ]);

    $service = Service::findOrFail($id);

    $iconPath = $service->icon; // keep old icon by default

    // if new icon uploaded
    if ($request->hasFile('icon')) {

        // delete old icon if exists
        if ($service->icon) {
            \Storage::disk('public')->delete($service->icon);
        }

        $iconPath = $request->file('icon')->store('service_icons', 'public');
    }

    $service->update([
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $iconPath,
    ]);

    return redirect()->route('service.index')
        ->with('success', 'Service updated successfully!');
}
    public function destroy($id){
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Service deleted successfully!');
    }
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.pages.service.show', compact('service'));
    }

}
