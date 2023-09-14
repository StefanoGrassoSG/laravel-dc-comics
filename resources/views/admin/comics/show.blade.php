@extends('layouts.main')

@section('page-title', 'Single comic')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1 class="mb-4 mt-4">
                    {{ $comic->title }}
                </h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="card w-50">
                <img src="{{ $comic->thumb }}" alt="">
                <div>
                    <h2>
                        Title: {{ $comic->title }}
                    </h2>
                </div>
                <div>
                    <h4>
                        Series: {{ $comic->series }}
                    </h4>
                </div>
                <div>
                    <p>
                        <h4>Descritpion: </h4>{{ $comic->description }}
                    </p>
                </div>
                <div>
                    <h4>
                        price
                    </h4>
                    {{ number_format($comic->price, 2) }} $
                </div>
            </div>
        </div>
    </div>
@endsection
