
@foreach ($sliders as $item)
    <div class="carousel-item {{ $item->sort_order == 0 ? 'active' : '' }}" data-bs-interval="10000">
        <img height="400px" src="{{ asset('images/sliders/' . $item->image) }}" class="d-block w-100" alt="">
    </div>
@endforeach
