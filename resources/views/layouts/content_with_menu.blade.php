@extends('layouts.app')

@section('content')
<div class="container-fluid w-75">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @yield('content_main')            
        </div>
        <div class="col-md-3">
            @include('layouts.side_menu')
        </div>
    </div>
</div>
@endsection