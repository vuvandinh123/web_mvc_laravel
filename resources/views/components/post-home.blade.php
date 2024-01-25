<div class="row">
    <h5 class="my-5 text-center tin-tuc fs-1"><a class="fs-1" href="?option=post">TIN TỨC</a> </h5>
    @foreach ($post_list as $item)
        <div class="col-md">
            <div class="img-tintuc">
                <a href="{{ $item->slug }}">
                    <img class="w-100" height="236px"
                        src="{{ asset('images/posts/'.$item->image) }}" alt="{{ $item->image }}">
                </a>
            </div>
            <h3 class="mt-3"><a class="text-capitalize link-hover" href="{{ $item->slug }}">{{ $item->title }}</a> </h3>
            <p class="m-0 mt-3 p-0 fs-4">{{ $item->created_at }}</p>
            <p class="fs-4 text-secondary text">{{ $item->metades }}</p>
        </div>
    @endforeach

</div>
