<div class="card my-3">
    <div class="card-body">
        <h3><a class="card-title" href="/blogs/{{ $blog->id }}">{{ $blog->title }}</a></h3>
        <p class="card-text">{{ __('By ') }}<a href="/users/{{ $blog->user_id }}">{{ $blog->author }}</a></p>
    </div>
    <img class="card-img-bottom mvh-50 object-fit-cover" src="{{ asset('storage/images/'.$blog->image) }}" alt="Card image cap">                 
</div>