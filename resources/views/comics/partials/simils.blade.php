<div class="row justify-content-center">
    @foreach ($simils as $simil)
        <div class="col-3 col-md-2 border-card mx-md-1 mx-lg-3 pt-2">
            <a href="{{ route('comics.show', $simil) }}">
                <figure>
                    <img src="{{ $simil->thumb }}" alt="">
                </figure>
                <div class="fw-semibold comic-card text-center">
                    <div class="m-0">{{ $simil->title }}</div>
                    <div class="m-0">${{ $simil->price }}</div>
                </div>
            </a>
        </div>
    @endforeach
</div>
