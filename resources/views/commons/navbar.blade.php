<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">Microposts</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                  <li class="nav-item ml-2"><a href="{{ route('logout') }}">Logout</a></li>
                  <li class="nav-item ml-2"><a href="{{ route('users.index') }}">Users</a></li>
                  <li class="nav-item ml-2"><a href="{{ route('users.show',Auth::id()) }}">My profile</a></li>
                @else
                  <li class="nav-item"><a href="{{ route('signup.get') }}">Signup</a></li>
                  <li class="nav-item ml-2"><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>