@extends('layouts.app')

@section('content')
@push('scripts')
    <script src="{{ asset('js/fileValidation.js') }}"></script>
@endpush
<div class="container-fluid w-75">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blogs/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <p class="form-control" id="title" name="title">{{ $blog->title }}</p>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">{{ __('Picture') }}</label>
					<div class="custom-file">
						<label id="file-name" for="image" class="custom-file-label img-file-selected"></label>
						<input type="file" accept="image/*" class="form-control-file custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="fileValidation();">
					</div>
                    <div id="image-preview-container" class="w-100 h-auto">
                        <img id="image-preview" class="img-form-preview" src="{{ asset('storage/images/'.$blog->image) }}" alt="preview"/>
                    </div>
                    @error('image')
                    <span id="image-error" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror 
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ __('Body') }}</label>
                    <textarea type="text" class="form-control @error('text') is-invalid @enderror" name="text" rows="10">{{ $blog->text }}</textarea>
                    @error('text')
                    <span id="text-error" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
                </div>
                <div class="mb-3">
                    <a href="/blogs/{{ $blog->id }}" class="btn btn-primary">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>                 
            </form>
        </div>
    </div>
</div>
@endsection