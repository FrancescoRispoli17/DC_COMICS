@extends('layouts.app')

@section('page-title')
    Home
@endsection

@section('content')
@include('components.Head-img')

<div class="w-100 pt-5" id="home-background">
    <h1 class="text-white fw-bold text-center" style="font-variant: small-caps slashed-zero;">EXPLORE DC's UNIVERSE</h1>
    {{-- <input type="text" id="hero"> <button class="btn btn-primary" id="cerca">Cerca</button>  --}}
    <div class="row mx-auto" id="home-gsap" >
        @for ($i=0;$i<47;$i++)
            @if (isset($characters[$i])) 
                <div class= " px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="{{route('characters.show',$characters[$i])}}">
                        <img src="{{$characters[$i]->thumb}}" alt="" width="100%">
                        <input type="hidden" id="name" value="{{ $characters[$i]->character }}"> 
                    </a>
                </div>
            @endif
            @if (isset($comics[$i]))
                <div class= "px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="{{route('comics.show',$comics[$i])}}" class="comics">
                        <img src="{{$comics[$i]->thumb}}" alt="" width="100%" style="object-fit: cover">
                         <input type="hidden" id="name" value="{{ $comics[$i]->title }}"> 
                    </a>
                </div>
            @endif
            @if (isset($series[$i]))
                <div class= "px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="{{route('comics.show',$series[$i])}}">
                        <img src="{{$series[$i]->thumb}}" alt="" width="100%"  style="object-fit: cover">
                         <input type="hidden" id="name" value="{{ $series[$i]->title }}"> 
                    </a>
                </div>
            @endif
            @if (isset($films[$i]))
                <div class= "px-0 px-md-1 opacity-50" style="width:4%;">
                    <a href="">
                        <img src="{{$films[$i]->thumb}}" alt="" width="100%" >
                        <input type="hidden" id="name" value="{{ $films[$i]->title }}"> 
                    </a>              
                </div>
            @endif
        @endfor
        <hr class="pt-sm-4 pt-md-5" style="margin-top:65px">
    </div>
</div>
@guest
<div class="container-fluid" id="gradiant">
    <div class="row align-items-center w-100">
        <div class="col-12 col-lg-7 text-white px-5 mt-5 mb-2 px-lg-0 ps-lg-5 mt-lg-0">
            <h1 class="display-5 fw-bold">JOIN THE DC UNIVERSE</h1>
            <p class="mb-4 mb-lg-5">Register for FREE to access member-exclusive content and activities, read FREE comics from DC UNIVERSE INFINITE,and get alerts and early access to exclusive products from DC Shop!</p>
            <a class="border rounded-pill text-white px-4 py-2 fw-bold" href="{{ route('login') }}">{{ __('SIGN UP NOW') }}</a>
        </div>
        <div class="col-12 col-lg-5">
            <img src="https://static.dc.com/2022-06/DC_Peacemaker_RegBan_cutout.png?" alt="" style=" width:100%;height:100%; object-fit: cover">
        </div>
    </div>
</div>
@endguest
@endsection
