<div class="dropdown flex-0-0-auto">
    <a id="options" role="button" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="h-100 img-fluid" src="{{ asset('svg\three-dots-vertical.svg') }}">
    </a>
    <div class="dropdown-menu" aria-labelledby="options">
        @if(!$user->admin)
        <a class="dropdown-item" href="/edit/{{ $blog->id }}">
            {{ __('Edit') }}
        </a>
        @elseif(!$blog->approved)
        <a class="dropdown-item" href="#" onclick="
        event.preventDefault();
        document.getElementById('approve-form').submit();">
            {{ __('Approve') }}
        </a>
        @endif
        <a class="dropdown-item" href="#" onclick="
        event.preventDefault();
        document.getElementById('delete-form').submit();">
            {{ __('Delete') }}
        </a>
    </div>
    <form id="delete-form" action="/blogs/{{ $blog->id }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
    <form id="approve-form" action="/approve/{{ $blog->id }}" method="POST" class="d-none">
        @csrf
        @method('PATCH')
    </form>
</div>                  