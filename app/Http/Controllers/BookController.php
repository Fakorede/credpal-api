<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Book;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\BookCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    public function index()
    {
        return new BookCollection(Book::all());
    }

    public function store()
    {
        $data = request()->validate([
            'isbn' => 'required|unique:books',
            'title' => 'required',
            'description' => 'required',
            'admin_id' => 'required',
        ]);

        try {
            $author = Admin::findOrFail($data['admin_id']);

            if ($author) {
                $book = request()->user()->books()->create($data);
                return response(new BookResource($book), 201);
            }

        } catch (ModelNotFoundException $ex) {
            throw $ex;
        }

        $book = request()->user()->books()->create($data);

        return response(new BookResource($book), 201);
    }
}
