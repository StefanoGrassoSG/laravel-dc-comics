@extends('layouts.main')

@section('page-title', 'create')

@section('content')
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col text-center">
            <h1>
                Add New Comic
            </h1>
        </div>    
    </div>

    @if ($errors->any()) 
        <div class="alert alert-danger mb-4"> 
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comics.store') }}" method="POST" class="p-5 d-flex justify-content-center">
        @csrf

        <div class="right w-50 p-5">
            <div class="mb-3">
                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" required>
                @error('title')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="descr" class="form-label">Description<span class="text-danger">*</span></label>
                <input type="text" name="description" class="form-control" id="descr" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Image Link</label>
                <input type="text" name="thumb" class="form-control" id="thumb" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                <input type="number" name="price" step="any" class="form-control" id="price" aria-describedby="emailHelp" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <div class="left w-50 p-5">
            <div class="mb-3">
                <label for="date" class="form-label">Sale Date</label>
                <input type="date" name="sale_date" class="form-control" id="date" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" name="series" class="form-control" id="series" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                <input type="text" name="type" class="form-control" id="type" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">Artists</label>
                <input type="text" name="artists" class="form-control" id="artists" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="writers" class="form-label">writers</label>
                <input type="text" name="writers" class="form-control" id="writers" aria-describedby="emailHelp">
            </div>
        </div>
       
        
    </form>
@endsection