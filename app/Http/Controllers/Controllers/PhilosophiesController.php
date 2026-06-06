<?php

namespace App\Http\Controllers;

use App\Models\Work_philosophies;
use Illuminate\Http\Request;

class PhilosophiesController extends Controller
{
    /**
     * Display all records
     */
public function index(Request $request)
{
    $query = Work_philosophies::query();

    if ($request->search) {
        $query->where('philosophy_text', 'like', '%' . $request->search . '%');
    }

    $philosophies = $query->latest()->paginate(10);

    return view('backend.pages.Philosophies.index', compact('philosophies'));
}

    /**
     * Show create form
     */
    public function create()
    {
        return view('backend.pages.Philosophies.create');
    }

    /**
     * Store new record
     */
    public function store(Request $request)
    {
        $request->validate([
            'philosophy_text' => 'nullable|string',

            // Features & policies come as JSON strings or arrays
            'features' => 'nullable',
            'policies' => 'nullable',
        ]);

        Work_philosophies::create([
            'philosophy_text' => $request->philosophy_text,

            // If coming from form, convert to JSON
            'features' => is_array($request->features)
                ? json_encode($request->features)
                : $request->features,

            'policies' => is_array($request->policies)
                ? json_encode($request->policies)
                : $request->policies,
        ]);

        return redirect()->route('philosophies.index')
            ->with('success', 'Philosophy created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $philosophy = Work_philosophies::findOrFail($id);
        return view('backend.pages.Philosophies.edit', compact('philosophy'));
    }

    /**
     * Update record
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'philosophy_text' => 'nullable|string',
            'features' => 'nullable',
            'policies' => 'nullable',
        ]);

        $philosophy = Work_philosophies::findOrFail($id);

        $philosophy->update([
            'philosophy_text' => $request->philosophy_text,

            'features' => is_array($request->features)
                ? json_encode($request->features)
                : $request->features,

            'policies' => is_array($request->policies)
                ? json_encode($request->policies)
                : $request->policies,
        ]);

        return redirect()->route('philosophies.index')
            ->with('success', 'Philosophy updated successfully.');
    }

    /**
     * Delete record
     */
    public function destroy($id)
    {
        $philosophy = Work_philosophies::findOrFail($id);
        $philosophy->delete();

        return redirect()->route('philosophies.index')
            ->with('success', 'Philosophy deleted successfully.');
    }
    public function show($id)
    {
        $philosophy = Work_philosophies::findOrFail($id);
        return view('backend.pages.Philosophies.show', compact('philosophy'));
    }
}