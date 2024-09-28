@extends('layouts.app')

@section('page-title')
    Show
@endsection

@section('content')
    <div class="container pt-4" id="show-page">
        <div class="row">
            <div class="col-auto fs-small">
                <a href="{{route('comics.index')}}">Comics</a>
                @auth
                    @if (Auth::user()->hasRole('dataMenager'))
                            aaaaaaaaaa
                    @endif
                @endauth
                <span class="mx-2">></span><span class="mx-2">{{$comic->title}}</span>
                <img src="{{$comic->thumb}}" alt="{{$comic->title}}" width="700px" class="d-block">
            </div>
            <div class="col pt-5">
                <div class="fw-semibold text-uppercase text-second">{{$comic->type}}</div>
                <div class="h1 display-4 mt-3 fw-bold lh-1 mb-4 text-uppercase">{{$comic->title}}</div>
                <hr>
                <p class="fw-semibold fs-5 text-secondary">DESCRIZIONE</p>
                <p class="fw-bold text-second pe-4">{{$comic->description}}</p>
                <hr>
                <div>
                    <p class="fw-semibold fs-5 text-secondary">MAGGIORI INFORMAZIONI</p>
                    <p class="fw-bold text-second mb-0">Artisti: <span class="fw-medium">
                            @foreach ($comic->artists as $index=>$artist)
                                {{$artist->name}}
                                @if ($index+1 < count($comic->artists))
                                    ,
                                @endif
                            @endforeach
                        </span>
                    </p>
                    <p class="fw-bold text-second mb-0">Data di uscita: <span class="fw-medium">{{$comic->date_sale}}</span></p>
                    <p class="fw-bold text-second mb-0">Tipo prodotto: <span class="fw-medium">Fumetti</span></p>
                    <p class="fw-bold text-second mb-0">Rilegatura: <span class="fw-medium">{{$comic->type}}</span></p>
                    <p class="fw-bold text-second mb-0">Page: <span class="fw-medium">{{$comic->page}}</span></p>
                    <p class="fw-bold text-second mb-0">Formato: <span class="fw-medium">{{$comic->size}}</span></p>
                </div>

                {{-- <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{route('comics.index')}}">Torna alla lista</a> --}}
            </div>
        </div>
    </div>
@endsection