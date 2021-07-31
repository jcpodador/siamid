<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(Book $book) {
        return response()->json($book,200);
    }

    public function search(Request $request) {
        $request->validate(['key'=>'string|required']);

        $books = Book::where('title','like',"%$request->key%")
            ->orWhere('price','like',"%$request->key%")->get();

        return response()->json($books, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'string|required',
            'price' => 'string|required',
            'author' => 'string|required',
            'publisher' => 'string|required',
            'details' => 'string|required',
        ]);

        try {
            $book = Book::create($request->all());
            return response()->json($book, 202);
        }catch(Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage()
            ],500);
        }

    }

    public function update(Request $request, Book $book) {
        try {
            $book->update($request->all());
            return response()->json($book, 202);
        }catch(Exception $ex) {
            return response()->json(['message'=>$ex->getMessage()], 500);
        }
    }

    public function destroy(Book $book) {
        $book->delete();
        return response()->json(['message'=>'book deleted.'],202);
    }

    public function index() {
        $books = Book::orderBy('name')->get();
        return response()->json($books, 200);
    }
}
