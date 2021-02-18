<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\BookRepository\iBookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{

    protected $bookRepo;

    public function __construct(iBookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
        $this->middleware('auth', ['except' =>  ['index', 'getbyCat', 'getById']]);
    }

    public function index()
    {

        $books = $this->bookRepo->getBooks();

        return response()->json([
            "data" => $books
        ]);
    }


    public function getbyCat($id)
    {

        $books = $this->bookRepo->detailbyCat($id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function getbyId($id)
    {

        $books = $this->bookRepo->DetailById($id);

        return response()->json([
            "data" => $books
        ]);
    }

    public function input(Request $request)
    {
        $data = $this->bookRepo->createBook($request);

        return response()->json([
            'message' => 'data berhasil masuk',
            'data' =>$data
        ], 201);
    }

    public function update($id, Request $request)
    {
        $data = $this->bookRepo->UpdateBook($id, $request);

        return response()->json([
            'message' => 'Data berhasil di Update',
            'data' => $data
        ], 201);
    }

    public function deleteData($id)
    {
        $data = $this->bookRepo->deleteBook($id);
    }

    public function borrow($id, Request $request)
    {
        $data = $this->bookRepo->borrowBook($id,$request);

        return response()->json([
            "data" => $data
        ]);
    }

    public function back($id, Request $request)
    {
        $data = $this->bookRepo->backBook($id, $request);

        return response()->json([
            "data" => $data
        ]);
    }
}
