<?php

namespace App\Repositories\BookRepository;

use App\Models\Book;
use App\Models\Category;
use App\Repositories\BookRepository\iBookRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PhpParser\Node\Stmt\TryCatch;

class BookRepository implements iBookRepository{

    public function getBooks()
    {
        $books = Book::all();
        return $books;
        // return response()->json([
        //     "data" => $book
        // ]);
    }

    public function DetailByCat($id){
        try {
            $category = Category::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "data" => "Not Found"
            ],400);
        }

        // $category = Category::find($id);
        $book = $category->books;
        return response()->json([
            "data" => $book
        ],200);
    }

    public function DetailById($id){
        $book = Book::Find($id);

        $data = isset($book->id) ? $book : 'Not Found';
        return response()->json([
            "data" => $book
        ],200);
    }



    public function createBook($request){
        try {
            $category = Category::findOrFail($request->category_id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                "data" => "Not Found"
            ],400);
        }

        $book = new Book();
        $book->category_id = $request->category_id;
        $book->name = $request->name;
        $book->description = $request->description;
        $book->year = $request->year;
        $book->save();

        return $book;
    }

    public function UpdateBook($id, $request){
        $book = Book::find($id);

        $book->name = $request->name;
        $book->description = $request->description;
        $book->year = $request->year;
        $book->save();

        return response()->json([
            "data" => $book,
        ],201);
    }

    public function deleteBook($id){
        $book = Book::find($id);
        $book->delete();

        return response()->json([
            "data" => $book->id,
            "message" => "Berhasil dihapus"
        ]);
    }
}
