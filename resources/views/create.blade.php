@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="/home" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="mb-3">
              <label for="image" class="form-label">{{ __('Picture') }}</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">{{ __('Body') }}</label>
                <textarea type="text" class="form-control" name="text" rows="10"></textarea>
              </div>
              <div>
                <a href="{{ URL::previous() }}" class="btn btn-primary">{{ __('Cancel') }}</a>             
                <button type="submit" class="btn btn-primary">{{ __('Post') }}</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
