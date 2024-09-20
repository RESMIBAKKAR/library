<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writer;

class WriterController extends Controller
{
        public function index()
        {
            $writers = Writer::all();
            return view('writers.index', compact('writers'));
        }

        public function create()
        {
            return view('writers.create');
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'nationality' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
            ]);

            Writer::create($validatedData);

            return redirect()->route('writers.index')->with('success', 'تم إضافة الكاتب بنجاح');
        }

        public function edit(Writer $writer)
        {
            return view('writers.edit', compact('writer'));
        }

        public function update(Request $request, Writer $writer)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'nationality' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
            ]);

            $writer->update($validatedData);

            return redirect()->route('writers.index')->with('success', 'تم تحديث بيانات الكاتب بنجاح');
        }

        public function destroy(Writer $writer)
        {
            $writer->delete();

            return redirect()->route('writers.index')->with('success', 'تم حذف الكاتب بنجاح');
        }
}
