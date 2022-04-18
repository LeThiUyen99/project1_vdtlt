@extends('layer.layout')
<style>
    .w3-col, .w3-half, .w3-third, .w3-twothird, .w3-threequarter, .w3-quarter {
        float: left;
        width: 100%!important;
    }
    .w3-quarter a{
        text-decoration: none;
    }
</style>
@section('content')
    @include('layer.layer')
@endsection
