<div class="row justify-content-center">
    @foreach ($simils as $simil)
        <div class="col-2 border-card mx-3">
            <a href="{{ route('comics.show', $simil) }}">
                <figure>
                    <img src="{{ $simil->thumb }}" alt="">
                </figure>
                <div class="fw-semibold comic-card d-flex text-center flex-column">
                    <div class="m-0">{{ $simil->title }}</div>
                    <div class="mt-auto">${{ $simil->price }}</div>
                </div>
            </a>
        </div>
    @endforeach
</div>
