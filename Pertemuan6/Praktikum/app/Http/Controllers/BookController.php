<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create(): View

    {
        return view(view: 'books.create');
    }

    public function store(Request $request): RedirectResponse

    {
        $validateData = $request->validate(rules: [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer',
        ]);

        Book::create(attributes: $validateData);
        return redirect(to: '/books')
        ->with(key: 'success', value: 'Book created successfully');
    }

    public function edit($id): View
    {
        $book = Book::findOrFail(id: $id);
        return view(view: 'books.edit', data: compact(var_name: 'book'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validateData = $request->validate(rules: [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|integer',
        ]);
        $book = Book::findOrFail(id: $id);
        $book->update($validateData);
        return redirect(to: '/books')->with(key: 'success', value: 'Book updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $book = Book::findOrfail(id: $id);
        $book->delete();

        return redirect(to: '/books')->with(key: 'success', value: 'Book deleted successfully');
    }
}
