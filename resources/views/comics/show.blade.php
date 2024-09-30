@extends('layouts.app')

@section('page-title')
    Show
@endsection

@section('content')
    <div class="container pt-4" id="show-page">
        <div class="row">
            <div class="col-auto fs-small">
                <a href="{{route('comics.index')}}">Comics</a>
                <span class="mx-2">></span><span class="mx-2">{{$comic->title}}</span>
                <img src="{{$comic->thumb}}" alt="{{$comic->title}}" width="700px" class="d-block">
            </div>
            <div class="col pt-5">
                <div class="fw-semibold text-uppercase text-second">{{$comic->type}}</div>
                <div class="h1 display-4 mt-3 fw-bold lh-1 mb-4 text-uppercase">{{$comic->title}}</div>
                <hr>
                <p class="fw-semibold fs-5 text-secondary">DESCRIZIONE</p>
                <p class="fw-bold text-second pe-4">{{$comic->description}}</p>
                <hr>
                <div>
                    <p class="fw-semibold fs-5 text-secondary">MAGGIORI INFORMAZIONI</p>
                    <p class="fw-bold text-second mb-0">Artisti: <span class="fw-medium">
                            @foreach ($comic->artists as $index=>$artist)
                                {{$artist->name}}
                                @if ($index+1 < count($comic->artists))
                                    ,
                                @endif
                            @endforeach
                        </span>
                    </p>
                    <p class="fw-bold text-second mb-0">Data di uscita: <span class="fw-medium">{{$comic->date_sale}}</span></p>
                    <p class="fw-bold text-second mb-0">Tipo prodotto: <span class="fw-medium">Fumetti</span></p>
                    <p class="fw-bold text-second mb-0">Rilegatura: <span class="fw-medium">{{$comic->type}}</span></p>
                    <p class="fw-bold text-second mb-0">Page: <span class="fw-medium">{{$comic->page}}</span></p>
                    <p class="fw-bold text-second mb-0">Formato: <span class="fw-medium">{{$comic->size}}</span></p>
                </div>
                @auth
                    @if (Auth::user()->hasRole('dataMenager'))
                        <div class="col-12 my-2">
                            <a type="button" class="btn btn-primary text-white" href="{{route('admin.comics.edit', $comic)}}">Modifica</a>
                        </div>
                    @endif
                @endauth

                {{-- <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{route('comics.index')}}">Torna alla lista</a> --}}
            </div>
        </div>
    </div>

    <div class="container simils position-relative">
        <h2 class="my-3 ms-5 ps-5">Guarda anche:</h2>
        <div id="simil-container">
            @include('comics.partials.simils', ['simils' => $simils])
        </div>

        <button id="prev" class="btn border rounded-3 border-black position-absolute top-50"
            data-url="{{ $simils->previousPageUrl() }}" {{ $simils->onFirstPage() ? 'disabled' : '' }}
            style="left:100px"><i class="fa-solid fa-less-than"></i></button>

        <button id="next" class="btn rounded-3 border-black position-absolute top-50" 
            data-url="{{ $simils->nextPageUrl() }}" {{ !$simils->hasMorePages() ? 'disabled' : '' }} 
            style="right:100px"><i class="fa-solid fa-greater-than"></i></button>
    </div>

    <script>
        document.getElementById("prev").addEventListener("click", function () {
            paginate(this.dataset.url);
        });

        document.getElementById("next").addEventListener("click", function () {
            paginate(this.dataset.url);
        });

        function paginate(url) {
            if (!url) return;

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Aggiorna il contenitore con i nuovi fumetti
                document.getElementById('simil-container').innerHTML = data.html;

                // Aggiorna i bottoni prev e next
                const prevButton = document.getElementById('prev');
                const nextButton = document.getElementById('next');

                // Aggiorna lo stato e l'URL dei bottoni
                prevButton.disabled = data.on_first_page;
                nextButton.disabled = !data.has_more_pages;

                prevButton.dataset.url = data.prev_page_url;
                nextButton.dataset.url = data.next_page_url;
            })
            .catch(error => console.error('Error:', error));
        }

    </script>
    
@endsection