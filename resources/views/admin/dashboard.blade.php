@extends('layouts.app')

@section('page-title')
    Profilo
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    @if (Auth::user()->hasRole('dataMenager'))
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-primary fw-bold" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h1>Ciao Vigilante</h1>
                            <div class="col-5 bg-body-secondary p-4 mt-4">
                                <h5>Qui troverai i tuoi dati personali completi</h5>
                                <p class="m-0 mt-4">{{ $user->name }}</p>
                                <p class="m-0">{{ $user->email }}</p>
                                <p class="m-0">Data di nascita: <span class=" {{ $user->hero?->data_nascita ? '' : 'fw-bold text-danger' }}">{{ $user->hero?->data_nascita ?? 'vuoto'}}</span></p>
                                <p class="m-0">Matricola: {{ $user->hero->matricola }}</p>
                                <p class="m-0">Codice Fiscale: <span class=" {{ $user->hero?->codice_fiscale ? 'text-uppercase' : 'fw-bold text-danger' }}">{{ $user->hero?->codice_fiscale ?? 'vuoto'}}</span></p>
                                <p class="m-0">Indirizzo di residenza: <span class=" {{ $user->hero?->indirizzo ? '' : 'fw-bold text-danger' }}">{{ $user->hero?->indirizzo ?? 'vuoto'}}</span></p>
                                @if (!$user->hero->data_nascita || !$user->hero->codice_fiscale || !$user->hero->indirizzo)
                                    <small><a href="{{route('profile.edit')}}" class="text-primary">Inserisci i dati mancanti</a></small>
                                @else
                                    <small><a href="{{route('profile.edit')}}" class="text-primary">Modifica</a></small>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-primary fw-bold" role="alert">
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
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
