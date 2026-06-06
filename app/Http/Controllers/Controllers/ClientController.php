<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display all clients
     */
    public function index()
    {
        $clients = Clients::latest()->get();
        return view('backend.pages.clients.index', compact('clients'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('backend.pages.clients.create');
    }

    /**
     * Store new client
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('clients', 'public');
        }

        Clients::create([
            'name'  => $request->name,
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $client = Clients::findOrFail($id);
        return view('backend.pages.clients.edit', compact('client'));
    }

    /**
     * Update client
     */
    public function update(Request $request, $id)
    {
        $client = Clients::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = $client->image;

        if ($request->hasFile('image')) {
            // delete old image
            if ($client->image && Storage::disk('public')->exists($client->image)) {
                Storage::disk('public')->delete($client->image);
            }

            $imagePath = $request->file('image')->store('clients', 'public');
        }

        $client->update([
            'name'  => $request->name,
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully.');
    }

    /**
     * Delete client
     */
    public function destroy($id)
    {
        $client = Clients::findOrFail($id);

        // delete image file
        if ($client->image && Storage::disk('public')->exists($client->image)) {
            Storage::disk('public')->delete($client->image);
        }

        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully.');
    }
    public function show($id)
    {
        $client = Clients::findOrFail($id);
        return view('backend.pages.clients.show', compact('client'));
    }
    
}