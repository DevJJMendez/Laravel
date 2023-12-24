@extends('layouts.app')
@section('content')

{{-- Form --}}
<form method="POST" action="{{ route('note-store') }}" >
    @csrf
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <div class="card px-1 py-4">
            <div class="card-body">
                <h6 class="information mt-4">Notes</h6>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="Title">
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group"> 
                                <input class="form-control" type="text" name="description" placeholder="Description">
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" d-flex flex-column text-center px-5 mt-3 mb-3">
                    <input class="btn btn-primary btn-block confirm-button" type="submit" value="Save">
                </div>
                <div class=" d-flex flex-column text-center px-5 mt-3 mb-3">
                    <a href="{{route('note-index')}}">
                        <button class="btn btn-primary btn-block confirm-button">Back</button> 
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection