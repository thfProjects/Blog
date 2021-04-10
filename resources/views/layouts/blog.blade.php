<div class="card my-3 blog">
    <div class="row no-gutters h-100">
        <div class="col-md-4 h-100">
            <img class="card-img-left" src="{{ asset('storage/images/'.$blog->image) }}" alt="{{ __('Image') }}">
        </div>
        <div class="col-md-8 h-100">
            <div class="card-body">
                <h3><a class="card-title nav-link px-0 py-0 d-inline" href="/blogs/{{ $blog->id }}">{{ $blog->title }}</a></h3>
                <p class="card-text">{{ __('By ') }}<a class="nav-link px-0 py-0 d-inline" href="/users/{{ $blog->user_id }}">{{ $blog->author }}</a></p>
            </div>
        </div>
    </div>                     
</div>