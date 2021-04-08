@extends('layouts.content_with_menu')

@section('content_main')
    @if($blog->approved || $blog->user_id == $user->id || $user->admin)
        @include('layouts.blog_show')
    @else
        @include('layouts.no_permission_message')
    @endif
@endsection