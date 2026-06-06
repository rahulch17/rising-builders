<?php

namespace App\Http\Controllers;

use App\Models\Hero_section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Display all hero sections
     */
public function index(Request $request)
{
    $query = Hero_section::query();

    // SEARCH (real DB search)
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('company_name', 'like', '%' . $request->search . '%')
              ->orWhere('label', 'like', '%' . $request->search . '%');
        });
    }

    // FILTER (active/inactive)
    if ($request->filled('status')) {
        $query->where('is_active', $request->status);
    }

    // ORDERING (real DB order)
    $query->orderBy('order', 'asc');

    // PAGINATION (real)
    $heroes = $query->paginate(10);

    return view('backend.pages.HeroSection.index', compact('heroes'));
}

    /**
     * Show create form
     */
    public function create()
    {
        return view('backend.pages.HeroSection.create');
    }

    /**
     * Store new hero section
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'company_name' => 'nullable|string|max:255',
            'label' => 'nullable|string',

            'heading_line1' => 'nullable|string',
            'heading_line2' => 'nullable|string',

            'primary_text' => 'nullable|string',
            'primary_link' => 'nullable|string',

            'secondary_text' => 'nullable|string',
            'secondary_link' => 'nullable|string',
        ]);

        // Upload image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hero', 'public');
        }

        Hero_section::create([
            'image' => $imagePath,
            'company_name' => $request->company_name,
            'label' => $request->label,

            'heading' => json_encode([
                'line1' => $request->heading_line1,
                'line2' => $request->heading_line2,
            ]),

            'buttons' => json_encode([
                'primary' => [
                    'text' => $request->primary_text,
                    'link' => $request->primary_link,
                ],
                'secondary' => [
                    'text' => $request->secondary_text,
                    'link' => $request->secondary_link,
                ],
            ]),
        ]);

        return redirect()->route('hero-section.index')
            ->with('success', 'Hero section created successfully!');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $hero = Hero_section::findOrFail($id);
        return view('backend.pages.HeroSection.edit', compact('hero'));
    }

    /**
     * Update hero section
     */
    public function update(Request $request, $id)
    {
        $hero = Hero_section::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'company_name' => 'nullable|string|max:255',
            'label' => 'nullable|string',

            'heading_line1' => 'nullable|string',
            'heading_line2' => 'nullable|string',

            'primary_text' => 'nullable|string',
            'primary_link' => 'nullable|string',

            'secondary_text' => 'nullable|string',
            'secondary_link' => 'nullable|string',
        ]);

        // Handle image update
        $imagePath = $hero->image;

        if ($request->hasFile('image')) {
            // delete old image
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }

            $imagePath = $request->file('image')->store('hero', 'public');
        }

        $hero->update([
            'image' => $imagePath,
            'company_name' => $request->company_name,
            'label' => $request->label,

            'heading' => json_encode([
                'line1' => $request->heading_line1,
                'line2' => $request->heading_line2,
            ]),

            'buttons' => json_encode([
                'primary' => [
                    'text' => $request->primary_text,
                    'link' => $request->primary_link,
                ],
                'secondary' => [
                    'text' => $request->secondary_text,
                    'link' => $request->secondary_link,
                ],
            ]),
        ]);

        return redirect()->route('hero-section.index')
            ->with('success', 'Hero section updated successfully!');
    }

    /**
     * Delete hero section
     */
    public function destroy($id)
    {
        $hero = Hero_section::findOrFail($id);

        // delete image
        if ($hero->image && Storage::disk('public')->exists($hero->image)) {
            Storage::disk('public')->delete($hero->image);
        }

        $hero->delete();

        return redirect()->route('hero-section.index')
            ->with('success', 'Hero section deleted successfully!');
    }
public function show($id)
{
    $hero = Hero_section::findOrFail($id);
    return view('backend.pages.HeroSection.show', compact('hero'));
}
}