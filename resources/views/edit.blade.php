@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="/blogs/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">{{ __('Picture') }}</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ __('Body') }}</label>
                    <textarea type="text" class="form-control" name="text" rows="10">{{ $blog->text }}</textarea>
                </div>
                <div>
                    <a href="/blogs/{{ $blog->id }}" class="btn btn-primary">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>                 
            </form>
        </div>
    </div>
</div>
@endsection