<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Book;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\BookCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    public function index()
    {
        if (request()->has('filter')) {

            $filter = request()->get('filter');
            $books = Book::with('admin')->where('title', 'LIKE', '%' . $filter . '%')
                ->get();

            return new BookCollection($books);

        } else if (request()->has('sortColumn')) {

            if(request()->has('sortDirection') && request()->get('sortDirection') == 'ASC') {
                $attr = request()->get('sortColumn');
                $books = Book::with('admin')->get();
                $books = $books->sortBy($attr);

                return new BookCollection($books);
            }

            $attr = request()->get('sortColumn');
            $books = Book::with('admin')->get();
            $books = $books->sortByDesc($attr);

            return new BookCollection($books);

        } else {

            $books = Book::with('admin')->paginate(10);
            return new BookCollection($books);

        }

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
