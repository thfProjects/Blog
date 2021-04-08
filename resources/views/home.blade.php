@extends('layouts.content_with_menu')

@section('content_main')
    @foreach($blogs as $blog)
        @include('layouts.blog')
    @endforeach
@endsection
