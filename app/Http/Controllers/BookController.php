<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Writer;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        $writers = Writer::all();
        return view('books.index', compact('books','categories','writers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $writers=Writer::all();
        $categories = Category::all();
        return view('books.create', compact('categories','writers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'writers_id' => 'required|exists:writers,id',
            'categories' => 'required|array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'file|mimes:pdf|max:10000',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/books'), $imageName);
            $validatedData['image'] = $imageName;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('pdf/books'), $pdfName);
            $validatedData['pdf'] = $pdfName;
        }
        $validatedData['users_id'] = auth()->id();

        $book = Book::create($validatedData);

        $book->categories()->attach($request->input('categories'));

        return redirect()->route('books.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);
       return view("books.show", compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::find($id);
        $writers=Writer::all();
        $categories = Category::all();
        return view("books.edit", compact('books','categories','writers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books = Book::find($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'writers_id' => 'required|exists:writers,id',
            'categories' => 'required|array',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'file|mimes:pdf|max:10000',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/books'), $imageName);
            $validatedData['image'] = $imageName;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('pdf/books'), $pdfName);
            $validatedData['pdf'] = $pdfName;
        }
        $validatedData['users_id'] = auth()->id();

        $books->update($validatedData);

        $books->categories()->sync($request->input('categories'));

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::find($id);
        $books->categories()->detach();
        $books->delete();
        return redirect()->route('books.index');
    }

}
