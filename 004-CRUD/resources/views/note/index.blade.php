@extends('layouts.app')
@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('note-create') }}">Create</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Read</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Read</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> --}}
      </ul>
    </div>
  </div>
</nav>

<br>

<ul class="list-group">
    @forelse ($notes as $note)
    <a href="#">
      <li class="list-group-item">Title: {{ $note->title }} <br> Description: {{ $note->description }} </li>
      <a href="{{ route('note-edit', ['note' => $note->id]) }}">Edit</a>
      <form action="{{ route('note-delete', ['note' => $note->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
      </form>
    </a>
    {{-- <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
    <li class="list-group-item">A fourth item</li>
    <li class="list-group-item">And a fifth one</li> --}}
    @empty
    <li class="list-group-item">No data found</li>
    @endforelse
  </ul>
@endsection