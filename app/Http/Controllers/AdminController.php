<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Languages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function edituser($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        return view('Pages.Admin.edit', compact('user')); // Pass the user to the view
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->update([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        ]);

        return redirect()->route('dashboard')->with('success', 'Utilisateur mis à jour avec succès!');
    }

    public function destroyuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'Utilisateur supprimé avec succès!');
    }

    public function editlang($id)
    {
        $language = Languages::findOrFail($id); // Find the user by ID
        return view('Pages.Admin.editlang', compact('language')); // Pass the user to the view
    }

    public function updatelang(Request $request, $id)
    {
        $language = Languages::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);


        $language->update([
            'name_language' => $validated['name'],
            'title_language' => $validated['title'],
            'description_language' => $validated['description'],
        ]);
        if ($request->hasFile('file')) {
            // Delete the old image if it exists
            $oldImagePath = public_path('storage/' . $language->image_path);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            $filePath = $request->file('file')->store('uploads', 'public');
            $language->update([
                'image_path' => $filePath,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Langue mise à jour avec succès!');
    }

    public function destroylang($id)
    {
        $language = Languages::findOrFail($id);

        $imagePath = public_path('storage/' . $language->image_path);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }


        // Delete the language record from the database
        $language->delete();

        return redirect()->route('dashboard')->with('success', 'Langue supprimée avec succès!');
    }
}
