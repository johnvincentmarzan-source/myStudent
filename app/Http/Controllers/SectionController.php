<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the sections.
     */
    public function index()
    {
        $sections = Section::orderBy('year_level')->orderBy('section_name')->get();
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new section.
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created section in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year_level'   => 'required|integer|min:1|max:4',
            'section_name' => 'required|string|max:50',
        ]);

        Section::create($validated);

        return redirect()->route('sections.index')
                         ->with('success', 'Section created successfully!');
    }

    /**
     * Show the form for editing the specified section.
     */
    public function edit(Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified section in storage.
     */
    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'year_level'   => 'required|integer|min:1|max:4',
            'section_name' => 'required|string|max:50',
        ]);

        $section->update($validated);

        return redirect()->route('sections.index')
                         ->with('success', 'Section updated successfully!');
    }

    /**
     * Remove the specified section from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('sections.index')
                         ->with('success', 'Section deleted successfully!');
    }
}
