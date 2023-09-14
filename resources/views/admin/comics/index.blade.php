@extends('layouts.main')

@section('page-title', 'Index di Comic')


@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    Index di Comic
                </h1>
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
                                        $artists = json_decode($comic->artists);
                                        $limitedArtists = Str::limit(implode(', ', $artists), 100, '...');
                                    @endphp
                                
                                    {{ $limitedArtists }}
                                </td>   
                                <td>
                                    @php
                                        $writers = json_decode($comic->writers);
                                        $limitedWriters = Str::limit(implode(', ', $writers), 100, '...');
                                    @endphp
                                
                                    {{ $limitedWriters }}
                                </td>                            
                                <td>
                                    <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">
                                        Vedi
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


