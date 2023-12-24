<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
  public function index(): View
  {
    $notes = Note::all();
    return view('note.index', compact('notes'));
  }
  public function create(): View
  {
    return view('note.create');
  }

  public function store(NoteRequest $request): RedirectResponse
  {
    Note::create([
      'title' => $request->title,
      'description' => $request->description
    ]);
    return redirect()->route('note-index')->with('success', 'Nota creada exitosamente');
  }
  public function edit(Note $note): View
  {
    return view('note.edit', compact('note'));
  }
  public function update(NoteRequest $request, Note $note): RedirectResponse
  {
    $note->update($request->all());
    return redirect()->route('note-index')->with('success', 'Nota actualizada exitosamente');
    ;
  }
  public function delete(Note $note): RedirectResponse
  {
    $note->delete();
    return redirect()->route('note-index')->with('danger', 'Nota eliminada exitosamente');
  }
}
