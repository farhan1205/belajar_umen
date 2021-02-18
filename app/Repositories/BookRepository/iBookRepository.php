<?php

namespace App\Repositories\BookRepository;

use Illuminate\Http\Client\Request;

interface iBookRepository
{
    public function getBooks();
    public function DetailByCat($id);
    public function DetailById($id);
    public function createBook($request);
    public function UpdateBook($id, $request);
    public function deleteBook($id);
    public function borrowBook($id, $request);
    public function backBook($id, $request);


}
