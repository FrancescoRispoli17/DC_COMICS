@extends('layouts.app')

@section('page-title')
    Profilo
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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
