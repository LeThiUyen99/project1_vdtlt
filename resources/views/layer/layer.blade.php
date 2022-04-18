@extends('layer.layout')
<style>
    .w3-col.m3, .w3-quarter {
        width: 100%!important;
    }
    .w3-col.l6 {
        width: 100%!important;
    }
    .w3-quarter a{
        text-decoration-line: none;
    }
</style>
@section('content')
    <div class="w3-col l6 w3-padding-large">
        <h1 class="w3-center">Our Menu</h1><br>
        @foreach($blogs as $blog)
        <div class="w3-quarter">
            <a href="detail/{{$blog->id}}">
                <img src="/image/{{ $blog->blogPicture }}" alt="Sandwich" style="width:100%">
                <h3>{!! $blog->blogName !!}</h3>
                <p>{{$blog->created_at}}</p>
                <p class="w3-text-grey">Xem chi tiết</p>
            </a>
        </div>
        @endforeach
    </div>
@endsection
