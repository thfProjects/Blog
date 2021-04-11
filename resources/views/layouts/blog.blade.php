<div class="card my-3">
    <div class="row no-gutters">
        <div class="col-md-4 blog-height">
            <img class="card-img-left" src="{{ asset('storage/images/'.$blog->image) }}" alt="{{ __('Image') }}">
        </div>
        <div class="col-md-8 blog-max-height">
            <div class="card-body">     
                <div class="blog-title">
                    <a class="card-title nav-link px-0 py-0 d-inline" href="/blogs/{{ $blog->id }}">{{ $blog->title }}</a>
                </div>          
                <p class="card-text">{{ __('By ') }}<a class="nav-link px-0 py-0 d-inline" href="/users/{{ $blog->user_id }}">{{ $blog->author }}</a></p>
            </div>
        </div>
    </div>                     
</div>