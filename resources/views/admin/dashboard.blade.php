@extends('layouts.app')

@section('page-title')
    Profilo
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Il mio Account</h1>
                        <div class="col-5 bg-body-secondary p-4 mt-4">
                            <h5>Informazioni di contatto</h5>
                            <p class="m-0 mt-4">{{ $user->name }}</p>
                            <p>{{ $user->email }}</p>
                            <small><a href="{{route('profile.edit')}}" class="text-primary">Modifica</a></small>
                        </div>
                        {{-- {{ $user->hero }} --}}
                        @if (Auth::user()->hasRole('dataMenager'))
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->hero->matricola }}</p>
                        @else
                            <p>{{ $user->name }}</p>
                            <p>{{ $user->email }}</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
