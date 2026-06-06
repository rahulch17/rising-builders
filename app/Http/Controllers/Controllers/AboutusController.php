<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutusController extends Controller
{
    public function index(Request $request)
    {
        $query = Aboutus::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $aboutus = $query->latest()->paginate(10);

        return view('backend.pages.Aboutus.index', compact('aboutus'));
    }

    public function create()
    {
        return view('backend.pages.Aboutus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'highlights' => 'nullable|array',   // ✅ FIXED
            'highlights.*' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutus = new Aboutus();
        $aboutus->title = $request->title;
        $aboutus->description = $request->description;

        // ✅ store array properly
        $aboutus->highlights = $request->highlights
            ? json_encode(array_values(array_filter($request->highlights)))
            : null;

        if ($request->hasFile('image')) {
            $aboutus->image = $request->file('image')->store('aboutus_images', 'public');
        }

        $aboutus->save();

        return redirect()->route('about.index')
            ->with('success', 'About Us section created successfully!');
    }

    public function edit($id)
    {
        $aboutus = Aboutus::findOrFail($id);
        return view('backend.pages.Aboutus.edit', compact('aboutus'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'highlights' => 'nullable|array',
        'highlights.*' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $aboutus = Aboutus::findOrFail($id);

    $aboutus->title = $request->title;
    $aboutus->description = $request->description;
    $aboutus->highlights = json_encode(array_filter($request->highlights ?? []));

    // ✅ IMAGE FIX (MOST IMPORTANT PART)
    if ($request->hasFile('image')) {

        // delete old image safely
        if ($aboutus->image && Storage::disk('public')->exists($aboutus->image)) {
            Storage::disk('public')->delete($aboutus->image);
        }

        // store new image
        $aboutus->image = $request->file('image')->store('aboutus_images', 'public');
    }

    $aboutus->save();

    return redirect()->route('about.index')
        ->with('success', 'Updated successfully!');
}

    public function destroy($id)
    {
        $aboutus = Aboutus::findOrFail($id);

        if ($aboutus->image) {
            Storage::disk('public')->delete($aboutus->image);
        }

        $aboutus->delete();

        return redirect()->route('about.index')
            ->with('success', 'About Us deleted successfully!');
    }

    public function show($id)
    {
        $aboutus = Aboutus::findOrFail($id);
        return view('backend.pages.Aboutus.show', compact('aboutus'));
    }
}