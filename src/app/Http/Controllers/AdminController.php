<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%$keyword%")
                  ->orWhere('first_name', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%");
            });
        }

        if ($request->filled('gender') && $request->input('gender') !== 'all') {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7)->appends($request->all());

        return view('admin', [
            'contacts' => $contacts,
            'inputs' => $request->all()
        ]);
    }

    public function find(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%$keyword%")
                  ->orWhere('first_name', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%");
            });
        }

        if ($request->filled('gender') && $request->input('gender') !== 'all') {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(7)->appends($request->all());

        return view('find', [
            'contacts' => $contacts,
            'inputs' => $request->all()
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin')->with('success', '削除しました');
    }
}

