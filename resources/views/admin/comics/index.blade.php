@extends('layouts.main')

@section('page-title', 'Index di Comic')


@section('content')
    
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col text-center">
                <h1>
                    Index di Comic
                </h1>
            </div>
            <div class="col text-center">
                <a href="{{ route('comics.create') }}" class="btn btn-success">+AGGIUNGI</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Thumb</th>
                            <th scope="col">Price</th>
                            <th scope="col">Series</th>
                            <th scope="col">Sale date</th>
                            <th scope="col">Type</th>
                            <th scope="col">Artists</th>
                            <th scope="col">Writers</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comics as $comic)
                            <tr>
                                <th scope="row">{{ $comic->id }}</th>
                                <td>{{ $comic->title }}</td>
                                <td>
                                    {{ Str::limit($comic->description, $limit = 100, $end = '...') }}
                                </td>
                                <td>
                                    <img src="{{ $comic->thumb }}" alt="" width="120px">
                                </td>
                                <td>{{ $comic->price }}</td>
                                <td>{{ $comic->series }}</td>
                                <td>{{ $comic->sale_date }}</td>
                                <td>{{ $comic->type }}</td>
                                <td>
                                    @php
                                        $writers = json_decode($comic->writers);
                                    @endphp

                                    @if (is_array($writers))
                                        @foreach ($writers as $writer)
                                            {{ $writer }}
                                            ,
                                        @endforeach
                                    @else
                                        {{ $writers }}
                                    @endif
                                </td>                            
                                <td>
                                    @php
                                        $artists = json_decode($comic->artists);
                                    @endphp

                                    @if (is_array($artists))
                                        @foreach ($artists as $artist)
                                            {{ $artist }}
                                            ,
                                        @endforeach
                                    @else
                                        {{ $artists }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary mb-2 w-100">
                                        Vedi
                                    </a>
                                    
                                    <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning w-100">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('comics.destroy', ['comic' => $comic->id]) }}"
                                        class="d-inline-block mt-2 w-100"
                                        method="POST"
                                        onsubmit="return confirm('Sei sicuro di voler cancellare questo elemento?');">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button type="submit" class="btn btn-danger w-100">
                                            Elimina
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


