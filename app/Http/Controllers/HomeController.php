<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Documents;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::check() && Auth::user()->role === 'Student') {
            $languages = DB::table('languages')->get();
            return view('Pages.Student.home', compact('languages'));
        } elseif (Auth::check() && Auth::user()->role === 'Teacher') {
            return view('Pages.Teacher.home');
        }
    }
    public function profile()
    {
        if (Auth::check() && Auth::user()->role === 'Student') {
            return view('Pages.Student.profile');
        } elseif (Auth::check() && Auth::user()->role === 'Teacher') {
            return view('Pages.Teacher.profile');
        }
    }
    public function contact()
    {
        if (Auth::check() && Auth::user()->role === 'Student') {
            return view('Pages.Student.contact');
        }
    }
    public function Documents(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'Student') {
            // Retrieve query parameters
            $level = $request->query('level');
            $subLevel = $request->query('subLevel');
            $language = $request->query('language');

            // Check if filtering is needed
            $isFiltering = $level && $subLevel && $language;
            if ( $isFiltering) {
                // Filter documents based on level and sub-level
                $documents = Documents::where('niveau_document', 'LIKE', "%$level%")
                    ->where('niveau_document', 'LIKE', "%$subLevel%")
                    ->where('language', 'LIKE', "%$language%")
                    ->get();
            } else {
                // Retrieve all documents if no filtering is applied
                $documents = DB::table('documents')->get();
            }

            // Return the view with the documents
            return view('Pages.Student.documents', compact('documents','isFiltering'));
        }
    }
    public function detail($id)
    {
        if (Auth::check() && Auth::user()->role === 'Student') {
            $document = DB::table('documents')->where('id', $id)->first();
            return view('Pages.Student.carddetails', compact('document'));
        }
    }

    public function languagecard($id = null)
    {
        if (Auth::check() && Auth::user()->role === 'Student') {
            $language = null;
            if ($id) {
                $language = DB::table('languages')->where('id', $id)->first();
                $documents = DB::table('documents')->get();
            }
            return view('Pages.Student.languagecard', compact('language', 'documents'));
        }
    }
    public function upload()
    {
        if (Auth::check() && Auth::user()->role === 'Teacher') {
            $languages = DB::table('languages')->get();
            return view('Pages.Teacher.upload', compact('languages'));
        }
    }
    public function document()
    {
        if (Auth::check() && Auth::user()->role === 'Teacher') {
            $documents = DB::table('documents')->get();
            return view('Pages.Teacher.document', compact('documents'));
        }
    }
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->role === 'Admin') {
            $users = DB::table('users')->where('role', '!=', 'Admin')->get();
            $documents = DB::table('documents')->get();
            $languages = DB::table('languages')->get();
            return view('Pages.Admin.dashboard', compact('users', 'languages', 'documents'));
        }
    }
    public function languagemanager()
    {
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return view('Pages.Admin.languagemanager');
        }
    }
}
