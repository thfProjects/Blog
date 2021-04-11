<div class="card my-3 sticky-top sidemenu">               
    @auth
        <div class="nav flex-column">
            @if(!$user->admin)           
                <li class="nav-item">
                    <a class="nav-link" href="/create">{{ __('New Post') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users/{{ $user->id }}">{{ __('My Posts') }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/users">{{ __('Users') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home?unapproved_only=true">{{ __('Unapproved posts') }}</a>
                </li>           
            @endif 
        </div> 
    @else
        <div class="nav flex-column">
            <li class="nav-item">
                <p class="nav-link">{{ __('Login or Register to start posting :)') }}</p>
            </li> 
        </div>
        <div class="card-body btn-toolbar">
            <a href="/login" class="btn btn-primary button-sidebar mx-1 mt-1">{{ __('Login') }}</a>             
            <a href="/register" class="btn btn-primary button-sidebar mx-1 mt-1">{{ __('Register') }}</a>
        </div>       
    @endauth   
</div>