<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library;

class LibraryController extends Controller
{
  public function index()
  {
      return Library::all();
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

}
