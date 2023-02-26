@extends('layouts.template')

@section("title")
{{ $title }}
@endsection


@section("content")

    {!! $content !!}
@endsection
@section("sidebar")
    {!! $sidebar !!}
@endsection