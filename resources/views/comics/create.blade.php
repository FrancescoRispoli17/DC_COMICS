@extends('layouts.app')

@section('page-title')
    Create
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">   
                <form action="{{ route('admin.comics.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control @if ($errors->get('title')) is-invalid @endif" id="exampleFormControlInput1" name="title" value="{{ old('title') }}">
                        @if ($errors->get('title'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('title') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">description</label>
                        <textarea class="form-control @if ($errors->get('description')) is-invalid @endif" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description') }}</textarea>
                        @if ($errors->get('description'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('description') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">thumb</label>
                        <input type="text" class="form-control @if ($errors->get('thumb')) is-invalid @endif" id="exampleFormControlInput1" name="thumb" value="{{ old('thumb') }}">
                        @if ($errors->get('thumb'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('thumb') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">price</label>
                        <input type="number" class="form-control @if ($errors->get('price')) is-invalid @endif" id="exampleFormControlInput1" name="price" value="{{ old('price') }}">
                        @if ($errors->get('price'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('price') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">series</label>
                        <input type="text" class="form-control @if ($errors->get('series')) is-invalid @endif" id="exampleFormControlInput1" name="series" value="{{ old('series') }}">
                        @if ($errors->get('series'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('series') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">sale date</label>
                        <input type="date" class="form-control @if ($errors->get('sale_date')) is-invalid @endif" id="exampleFormControlInput1" name="sale_date" value="{{ old('sale_date') }}">
                        @if ($errors->get('sale_date'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('sale_date') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">type</label>
                        <input type="text" class="form-control @if ($errors->get('type')) is-invalid @endif" id="exampleFormControlInput1" name="type" value="{{ old('type') }}">
                        @if ($errors->get('type'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('type') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection