@extends('layouts.app')

@section('page-title')
    Home
@endsection

@section('content')
@include('components.Head-img')

<div class="w-100 pt-5" id="home-background">
    <h1 class="text-white fw-bold text-center">ESPLORA IL MONDO DC</h1>
    {{-- <input type="text" id="hero"> <button class="btn btn-primary" id="cerca">Cerca</button>  --}}
        <div class="row mx-auto" id="home-gsap" style="width:95%;">
            {{-- @foreach ($characters as $character)
                <div class= "col-1 mt-1 mt-md-3 px-0" style="width:4%;">
                    <img src="{{$character->thumb}}" alt="" width="100%">
                    <input type="hidden" id="name" value="{{ $character->character }}">
                </div>
            @endforeach
            @foreach ($comics as $comic)
                <div class= "col-1 mt-1 mt-md-3 px-0" style="width:4%;">
                    <img src="{{$comic->thumb}}" alt="" width="100%">
                    <input type="hidden" id="name" value="{{ $comic->title }}">
                </div>
            @endforeach
            @foreach ($films as $film)
            <div class= "col-1 mt-1 mt-md-3 px-0" style="width:4%;">
                <img src="{{$film->thumb}}" alt="" width="100%">
                <input type="hidden" id="name" value="{{ $film->title }}">
            </div>
        @endforeach --}}
        @for ($i=0;$i<75;$i++)
            @if (isset($characters[$i])) 
                <div class= "col-1 mt-1 mt-md-3 px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="#">
                        <img src="{{$characters[$i]->thumb}}" alt="" width="100%">
                        <input type="hidden" id="name" value="{{ $characters[$i]->character }}"> 
                    </a>
                </div>
            @endif
            @if (isset($comics[$i]))
                <div class= "col-1 mt-1 mt-md-3 px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="{{route('comics.show',$comics[$i])}}">
                        <img src="{{$comics[$i]->thumb}}" alt="" width="100%" height="100%" style="object-fit: cover">
                         <input type="hidden" id="name" value="{{ $comics[$i]->title }}"> 
                    </a>
                </div>
            @endif
            @if (isset($series[$i]))
                <div class= "col-1 mt-1 mt-md-3 px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="{{route('comics.show',$series[$i])}}">
                        <img src="{{$series[$i]->thumb}}" alt="" width="100%" height="100%" style="object-fit: cover">
                         <input type="hidden" id="name" value="{{ $series[$i]->title }}"> 
                    </a>
                </div>
            @endif
            @if (isset($films[$i]))
                <div class= "col-1 mt-1 mt-md-3 px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="">
                        <img src="{{$films[$i]->thumb}}" alt="" width="100%">
                        <input type="hidden" id="name" value="{{ $films[$i]->title }}"> 
                    </a>              
                </div>
            @endif
        @endfor
        </div>
</div>
<script>
    
</script>
@endsection
