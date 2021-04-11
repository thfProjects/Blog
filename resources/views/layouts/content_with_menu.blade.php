@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            @yield('content_main')            
        </div>
        <div class="col-4">
            @include('layouts.side_menu')
        </div>
    </div>
</div>
@endsection