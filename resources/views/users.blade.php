@extends('layouts.content_with_menu')

@section('content_main')
    @foreach($users as $user)
        @include('layouts.user')
    @endforeach
@endsection