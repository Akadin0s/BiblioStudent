<?php


namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class DocumentManController extends Controller
{
    public function editdocument($id)
    {
        $document = Documents::findOrFail($id); // Find the document by ID
        $languages = DB::table('languages')->get(); // Get all languages
        return view('Pages.Teacher.editdocument', compact('document', 'languages')); // Pass the document to the view
    }

    public function updatedocument(Request $request, $id)
    {
        $document = Documents::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'required|string',
            'language' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,pptx|max:5120',
        ]);


        $document->update([
            'name_document' => $validated['name'],
            'description_document' => $validated['description'],
            'niveau_document' => $validated['level'],
            'language' => $validated['language'],
        ]);
        if ($request->hasFile('file')) {
            // Delete the old image if it exists
            $oldImagePath = public_path('storage/' . $document->file_document);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            $filePath = $request->file('file')->store('uploads/documents', 'public');
            $document->update([
                'file_document' => $filePath,
            ]);
        }

        return redirect()->route('document')->with('success', 'Document mis à jour avec succès !');
    }

    public function destroydocument($id)
    {
        $document = Documents::findOrFail($id);
        $document->delete();

        return redirect()->route('document')->with('success', 'Document supprimé avec succès !');
    }
}
