@extends('layouts.app')

@section('page-title')
    Show
@endsection

@section('content')       
     <div class="container">
        <div class="fs-small">
            <a href="{{route('characters.index')}}">Characters</a>
            <span class="">></span><span class="mx-2">{{$character->character}}</span>
        </div>
        <div class="row">
            <div class="col-3 fs-small">
                <img src="{{$character->thumb}}" alt="{{$character->character}}" class="w-100 mt-3">
            </div>
            <div class="col-7">
                <h1 class="fw-bold text-uppercase mt-4 display-5">{{$character->character}}</h1>
                @if ($character->members)
                <p>Membri: {{$character->members}}</p>
                @endif
                <h3 class="fw-bold">OFFICIAL CHARACTER PROFILE | DC COMICS</h3>
                <p>{{$character->description}}</p>
                <p><span class="fw-bold">Prima apparizione: </span>{{$character->first_appearance}}</p>
                <p><span class="fw-bold">Data rilascio: </span>{{$character->release_date}}</p>
                <p class="fw-bold text-second mb-0 testo">Creatori: <span class="fw-medium">
                @foreach ($character->artists as $index=>$artist)
                    {{$artist->name}}
                    @if ($index+1 < count($character->artists))
                        ,
                    @endif
                @endforeach
                </p>
            </div>
        </div>
     </div>
    {{-- @auth
        @if (Auth::user()->hasRole('dataMenager'))
            <div class="col-12 my-2">
                <a type="button" class="btn btn-primary text-white" href="{{route('admin.comics.edit', $comic)}}">Modifica</a>
            </div>
        @endif
    @endauth --}}
@endsection