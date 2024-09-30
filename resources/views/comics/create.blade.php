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
                        <label for="exampleFormControlInput1" class="form-label">Titolo</label>
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
                        <label for="exampleFormControlTextarea1" class="form-label">Descrizione</label>
                        <textarea class="form-control @if ($errors->get('description')) is-invalid @endif" id="exampleFormControlTextarea1" rows="5" name="description">{{ old('description') }}</textarea>
                        @if ($errors->get('description'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('description') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Link immagine</label>
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
                        <label for="exampleFormControlInput1" class="form-label">Prezzo</label>
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
                        <label for="exampleFormControlInput1" class="form-label">Numero pagine</label>
                        <input type="number" class="form-control @if ($errors->get('page')) is-invalid @endif" id="exampleFormControlInput1" name="page" value="{{ old('page') }}">
                        @if ($errors->get('page'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('page') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Data di uscita</label>
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
                        <select class="form-select  @if ($errors->get('type')) is-invalid @endif" aria-label="Default select example" name="type">
                            <option value="0" selected disabled>Tipo di fumetto</option>
                          
                            <option value="Brossura" @if (old('type') == 'Brossura') selected @endif>Brossura</option>
                            <option value="Cartonato" @if (old('type') == 'Cartonato') selected @endif>Cartonato</option>
                            <option value="Spillato" @if (old('type') == 'Spillato') selected @endif>Spillato</option>
                          
                        </select>
                          @if ($errors->get('type'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('type') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Misure</label>
                        <input type="text" class="form-control @if ($errors->get('size')) is-invalid @endif" id="exampleFormControlInput1" name="size" value="{{ old('size') }}">
                        @if ($errors->get('size'))
                            <div class="invalid-feedback">
                                @foreach ($errors->get('size') as $error )
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Artist</label>
                        <div>
                            @foreach ($artists as $artist)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @if($errors->has('artists')) is-invalid @endif" type="checkbox" id="artist-{{ $artist->id }}" value="{{ $artist->id }}" name="artists[]" {{ in_array($artist->id, old('artists', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="artist-{{ $artist->id }}">{{ $artist->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection