@extends('layouts.app')

@section('content')
@push('scripts')
    <script src="{{ asset('js/fileValidation.js') }}"></script>
@endpush
<div class="container-fluid w-75">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/home" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', '') }}">
                    @error('title')
                        <span id="title-error" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror               
                </div>
                <div class="mb-3">
					<label for="image" class="form-label">{{ __('Picture') }}</label>
					<div class="custom-file">
						<label id="file-name" for="image" class="custom-file-label"></label>
						<input type="file" accept="image/*" class="form-control-file custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="fileValidation();">
					</div>
					<div id="image-preview-container" class="w-100 h-auto">

                    </div>
                    @error('image')
                        <span id="image-error" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{ __('Body') }}</label>
                    <textarea type="text" class="form-control @error('text') is-invalid @enderror" name="text" rows="10">{{ old('text', '') }}</textarea>
                    @error('text')
                        <span id="text-error" class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
                <div class="mb-3">
                    <a href="/home" class="btn btn-primary">{{ __('Cancel') }}</a>             
                    <button type="submit" class="btn btn-primary">{{ __('Post') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
