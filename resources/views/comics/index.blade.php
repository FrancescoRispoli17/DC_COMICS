@extends('layouts.app')

@section('page-title')
    Comics
@endsection

{{-- @section('active')
    headerActive
@endsection --}}

@section('content')
    @include('components.Head-img')
    <div id="section-2">
        <div class="container position-relative pt-5">
            <div class="row">
                @auth
                    @if (Auth::user()->hasRole('dataMenager'))
                        <div class="col-12 my-2">
                            <a href="{{ route('admin.comics.create') }}" class="btn btn-primary text-white">Nuovo fumetto</a>
                        </div>
                    @endif
                @endauth
                @foreach ($comics as $comic )
                    <div class="col-6 col-md-4 col-lg-3 p-4 border-card">
                        <a href="{{route('comics.show',$comic)}}">
                            <figure>
                                <img src="{{$comic->thumb}}" alt="">
                            </figure>
                            <div class="fw-semibold comic-card d-flex text-center flex-column">
                                <div class="m-0">{{$comic->title}}</div>
                                <div><small class="fw-light">{{$comic->type}}</small></div>
                                <div class="text-secondary fw-light">{{$comic->sale_date}}</div>
                                <div class="mt-auto">${{$comic->price}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="bg-main py-5" id="section-3">
        <div class="container text-light">
            <div class="row">
                <div class="col-auto">
                    <i class="fa-solid fa-tablet-screen-button"></i>
                </div>
                <div class="col py-3 me-5">
                    DIGITAL COMICS
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-shirt"></i>
                </div>
                <div class="col py-3 me-5">
                    DC MERCHANDISE
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-user-pen"></i>
                </div>
                <div class="col py-3 me-5">
                    SUBSCRIPTION
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="col-auto py-3 me-5">
                    COMIC SHOP LOCATOR
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <div class="col-auto py-3 me-5">
                    DC POWER VISA
                </div>
            </div>
        </div>
    </div> --}}
@endsection