<div class="card my-3">
    <div class="card-body d-flex justify-content-between">
        <div>
            <h3 class="card-title" href="/blogs/{{ $blog->id }}">{{ $blog->title }}</h3>
            <p class="card-text">{{ __('By ') }}<a class="nav-link px-0 py-0 d-inline" href="/users/{{ $blog->user_id }}">{{ $author }}</a></p>
        </div>
        @if($user->id == $blog->user_id || $user->admin)
            @include('layouts.blog_options')
        @endif
    </div>
    <div class="card-body">
        <img class="img-fluid" src="{{ asset('storage/images/'.$blog->image) }}" alt="{{ __('') }}">       
    </div>       
    <div class="card-body">
        <div class="card-text">
            <p class="pre-wrap blog-text p-1">{{ $blog->text }}</p>
        </div>       
    </div>               
</div>