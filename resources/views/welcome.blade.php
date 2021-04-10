@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row align-items-center h-100">
        <div class="col">
            <div class="text-center title">
                {{ __('Welcome') }}
            </div>
            <div class="text-center">
                <a class="nav-link" href="/home">{{ __('Check out some blogs') }}</a>
            </div>
        </div>
    </div>   
</div>
@endsection