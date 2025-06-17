<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function upload(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,pptx|max:5120',
        ]);



        $filePath = $request->file('file')->store('uploads/documents', 'public');
        Documents::create([
            'name_document' => $validated['name'],
            'description_document' => $validated['description'],
            'file_document' => $filePath,
            'niveau_document' => $validated['level'],
            'language' => $validated['language'],
        ]);

        return back()->with('success', 'Document ajouté avec succès!');
    }
}
