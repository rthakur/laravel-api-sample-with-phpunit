<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library;

class LibraryController extends Controller
{
  public function index(Request $request)
  {
    $library = new Library;
    $library = $this->applySearchSort($library, $request);
    return $library->get();
  }

  public function show(Library $library)
  {
      return $library;
  }

  public function store(Request $request)
  {
      $validatedData = $request->validate([
         'title' => 'required|max:255',
         'isbn_number' => 'required|unique:libraries|max:255',
         'author_first_name' => 'required',
         'author_last_name' => 'required',
         'year_of_creation' => 'required|integer',
     ]);

    $library = Library::create($request->all());
    return response()->json($library, 201);
  }

  public function update(Request $request, Library $library)
  {
      $library->update($request->all());

      return response()->json($library, 200);
  }

  public function delete(Library $library)
  {
      $library->delete();
      return response()->json(null, 204);
  }


  private function applySearchSort($library, $request)
  {
    $keyboard = $request->search;
    $sortableFields = ['title', 'isbn_number', 'author_first_name', 'year_of_creation'];

    //Apply search
      if ( $keyboard )
      $library = $library->where('title', 'like', '%'.$keyboard.'%')
      ->orWhere('title', 'like', '%'.$keyboard.'%')
      ->orWhere('isbn_number', 'like', '%'.$keyboard.'%')
      ->orWhere('author_first_name', 'like', '%'.$keyboard.'%')
      ->orWhere('author_last_name', 'like', '%'.$keyboard.'%')
      ->orWhere('year_of_creation', 'like', '%'.$keyboard.'%');

      //Apply Sorting
      if (  in_array($request->sort, $sortableFields) )
      {
        $order = ($request->order)? $request->order : 'asc';
        $library = $library->orderBy($request->sort, $order);
      }

      return $library;

  }

}
