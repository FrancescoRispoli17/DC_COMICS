@extends('layouts.app')

@section('page-title')
    Edit
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('comics.update',$comic->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title',$comic->title) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="description">{{ old('description',$comic->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">thumb</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="thumb" value="{{ old('thumb',$comic->thumb) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">price</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="price" value="{{ old('price',$comic->price) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">series</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="series" value="{{ old('series',$comic->series) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">sale date</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="sale_date" value="{{ old('sale_date',$comic->sale_date) }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">type</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="type" value="{{ old('type',$comic->type) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection