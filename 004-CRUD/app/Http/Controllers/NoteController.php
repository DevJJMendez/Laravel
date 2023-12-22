<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  public function index()
  {
    $notes = Note::all();
    return view('note.index', compact('notes'));
  }
  public function create()
  {
    return view('note.create');
  }
  public function store(Request $request)
  {
    Note::create([
      'title' => $request->title,
      'description' => $request->description
    ]);
    return redirect()->route('note-index');
  }
  public function update($note)
  {
    $myNote = Note::find($note);
  }
}
