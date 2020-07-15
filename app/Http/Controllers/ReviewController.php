<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\Review as ReviewResource;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store($id)
    {
        $data = request()->validate([
            'review' => 'required|integer',
            'comment' => 'required|string',
        ]);

        $book = Book::findorfail($id);

        $review = $book->reviews()->create(array_merge($data, [
            'user_id' => auth()->user()->id,
        ]));

        return response(new ReviewResource($review), 201);
    }
}
