<?php

namespace App\Http\Controllers;
use App\Models\Company_directions;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class CompanyDirectionController extends Controller
{
    public function index(Request $request)
    {
        $query = Company_directions::query();

        if ($request->search) {
            $query->where('vision', 'like', '%' . $request->search . '%')
                  ->orWhere('mission', 'like', '%' . $request->search . '%');
        }

        $company_directions = $query->latest()->paginate(10);

        return view('backend.pages.CompanyDirection.index', compact('company_directions'));
    }

    public function create()
    {
        return view('backend.pages.CompanyDirection.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = [
            'vision' => $request->vision,
            'mission' => $request->mission,
        ];

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('company_directions_icons', 'public');
        }

        Company_directions::create($data);

        return redirect()->route('company_direction.index')
            ->with('success', 'Company direction created successfully!');
    }

    public function edit($id)
    {
        $company_direction = Company_directions::findOrFail($id);
        return view('backend.pages.CompanyDirection.edit', compact('company_direction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vision' => 'required|string',
            'mission' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $company_direction = Company_directions::findOrFail($id);

        $data = [
            'vision' => $request->vision,
            'mission' => $request->mission,
        ];

        if ($request->hasFile('icon')) {

            if ($company_direction->icon) {
                Storage::disk('public')->delete($company_direction->icon);
            }

            $data['icon'] = $request->file('icon')->store('company_directions_icons', 'public');
        }

        $company_direction->update($data);

        return redirect()->route('company_direction.index')
            ->with('success', 'Company direction updated successfully!');
    }

    public function destroy($id)
    {
        $company_direction = Company_directions::findOrFail($id);

        if ($company_direction->icon) {
            Storage::disk('public')->delete($company_direction->icon);
        }

        $company_direction->delete();

        return redirect()->route('company_direction.index')
            ->with('success', 'Company direction deleted successfully!');
    }

    public function show($id)
    {
        $company_direction = Company_directions::findOrFail($id);
        return view('backend.pages.CompanyDirection.show', compact('company_direction'));
    }
}
