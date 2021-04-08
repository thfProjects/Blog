<div class="card my-3">
    <div class="card-body d-flex justify-content-between">
        <div>
            <h3><a class="card-title" href="/blogs/{{ $blog->id }}">{{ $blog->title }}</a></h3>
            <p class="card-text">{{ __('By ') }}<a href="/users/{{ $blog->user_id }}">{{ $author }}</a></p>
        </div>
        @if($user->id == $blog->user_id || $user->admin)
            @include('layouts.blog_options')
        @endif
    </div>
    <img class="img-fluid" src="{{ asset('storage/images/'.$blog->image) }}" alt="Card image cap">
    <div class="card-body">
        <div class="card-text">
            <p class="pre-wrap">{{ $blog->text }}</p>
        </div>       
    </div>               
</div>