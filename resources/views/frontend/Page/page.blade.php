@extends('layout.site')


@section('content')
<style>
    .page{
        font-size: 100%;
    }
</style>
<div class="container my-5 page">
    {!! $page->detail !!}
</div>
@endsection