@extends('layouts.main')

@section('page-title', 'Edit')

@section('content')
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col text-center">
            <h1>
                Edit comic
            </h1>
        </div>    
    </div>

    <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST" class="p-5 d-flex justify-content-center">
        @csrf
        @method('PUT')

        <div class="right w-50 p-5">
            <div class="mb-3">
                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" value="{{ old('title', $comic->title) }}">
                @error('title')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="descr" class="form-label">Description<span class="text-danger">*</span></label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="descr" aria-describedby="emailHelp" value="{{ old('description', $comic->description) }}">
                @error('description')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Image Link</label>
                <input type="text" name="thumb" class="form-control @error('thumb') is-invalid @enderror" id="thumb" aria-describedby="emailHelp" value="{{ old('thumb', $comic->thumb) }}">
                @error('thumb')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                <input type="number" name="price" step="any" class="form-control @error('price') is-invalid @enderror" id="price" aria-describedby="emailHelp" value="{{ old('price', $comic->price) }}">
                @error('price')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </div>

        <div class="left w-50 p-5">
            <div class="mb-3">
                <label for="date" class="form-label">Sale Date</label>
                <input type="date" name="sale_date" class="form-control @error('sale_date') is-invalid @enderror" id="date" aria-describedby="emailHelp" value="{{ old('sale_date', $comic->sale_date) }}">
                @error('sale_date')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" name="series" class="form-control @error('series') is-invalid @enderror" id="series" aria-describedby="emailHelp" value="{{ old('series', $comic->series) }}">
                @error('series')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" aria-describedby="emailHelp" value="{{ old('type', $comic->type) }}">
                @error('type')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div> 
                @enderror
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">Artists</label>
                <input type="text" name="artists" class="form-control" id="artists" aria-describedby="emailHelp" value="{{ old('artists', $comic->artists) }}">
            </div>
            <div class="mb-3">
                <label for="writers" class="form-label">writers</label>
                <input type="text" name="writers" class="form-control" id="writers" aria-describedby="emailHelp" value="{{ old('writers', $comic->writers) }}">
            </div>
        </div>
    
    </form>
@endsection