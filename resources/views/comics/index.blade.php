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
        <div class="container position-relative pt-1 pt-md-4">
            <div class="row">
                @auth
                    @if (Auth::user()->hasRole('dataMenager'))
                        <div class="col-12 my-2">
                            <a href="{{ route('admin.comics.create') }}" class="btn btn-primary text-white">Nuovo fumetto</a>
                        </div>
                    @endif
                @endauth
                <div class="col-12 text-end mb-3 p-0">
                    <form action="{{ route('comics.index') }}" method="GET" class="ms-auto border w-25">
                        <input type="text" name="title" class="border-0 w-75 m-0" style=" outline:none;">
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
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
            {{-- <div class=" py-3">
                {{ $comics->links() }}
            </div> --}}
        </div>
    </div>
@endsection