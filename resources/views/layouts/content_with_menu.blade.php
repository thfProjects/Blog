@extends('layouts.app')

@section('content')
<div class="container-fluid  h-100 w-75">
    <div class="row h-100 justify-content-center">
        <div class="col-md-6 overflow-auto mh-100 hidescroll">
            @yield('content_main')            
        </div>
        <div class="col-md-3">
            @include('layouts.side_menu')
        </div>
    </div>
</div>
@endsection