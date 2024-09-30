<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index()
    {
        $translations = Translation::all();
        return view('translations.index', compact('translations'));
    }

    public function create()
    {
        return view('translations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:translations,key',
            'language' => 'required|string|max:2',
            'value' => 'required',
        ]);

        Translation::create($request->all());

        return redirect()->route('translations.index')
            ->with('success', 'Translation created successfully.');
    }

    public function show(Translation $translation)
    {
        return view('translations.show', compact('translation'));
    }

    public function edit(Translation $translation)
    {
        return view('translations.edit', compact('translation'));
    }

    public function update(Request $request, Translation $translation)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:translations,key',
            'language' => 'required|string|max:2',
            'value' => 'required',
        ]);

        $translation->update($request->all());

        return redirect()->route('translations.index')
            ->with('success', 'Translation updated successfully.');
    }

    public function destroy(Translation $translation)
    {
        $translation->delete();

        return redirect()->route('translations.index')
            ->with('success', 'Translation deleted successfully.');
    }
}
