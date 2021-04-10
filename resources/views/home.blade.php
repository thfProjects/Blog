@extends('layouts.content_with_menu')

@section('content_main')
    @forelse($blogs as $blog)
        @include('layouts.blog')
    @empty
        @include('layouts.no_blogs_message')
    @endforelse
@endsection
