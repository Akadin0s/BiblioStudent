<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function languagemanager(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);


        // Store the uploaded file in the 'uploads' folder and get the path
        $filePath = $request->file('file')->store('uploads', 'public');
        Languages::create([
            'name_language' => $validated['name'],
            'title_language' => $validated['title'],
            'description_language' => $validated['description'],
            'image_path' => $filePath,
        ]);

        return back()->with('success', 'Langue ajoutée avec succès!');
    }
}
