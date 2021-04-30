@extends('layouts.content_with_menu')

@section('content_main')
    @foreach($users as $_user)
        @include('layouts.user')
    @endforeach
@endsection