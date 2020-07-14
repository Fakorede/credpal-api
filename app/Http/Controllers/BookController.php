<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
    public function index()
    {
        return new BookCollection(Book::all());
    }

    public function store()
    {
        $data = request()->validate([
            'data.attributes.isbn' => '',
            'data.attributes.title' => '',
            'data.attributes.description' => '',
        ]);

        // dd($data);

        $book = request()->user()->books()->create($data['data']['attributes']);

        return response(new BookResource($book), 201);
    }
}
