<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Register</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/register/moviment">Moviment</a>
                        <a class="dropdown-item" href="/register/leadership">Leadership</a>
                        <a class="dropdown-item" href="#">Tribe</a>
                        <a class="dropdown-item" href="#">Grade</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/register">User</a>
                    </div>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->rules!=5)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Posts</a>
                            <div class="dropdown-menu">
                               <a class="nav-link" href="/posts/create">Create Post</a>
                                <a class="nav-link" href="/posts">Show Posts</a>
                            </div>
                        </li>
                    @endif
                   <li class="nav-item">

                        <a class="nav-link active" href="/logout">Logout</a>

                </li>

                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">User</a>--}}
                {{--</li>--}}
            </ul>


              <a class="nav-link ml-auto" >{{ Auth::user()->name }} - {{ Auth::user()->rules }}</a>

            @else
                <a class="nav-link active" href="/login">Login</a>
            @endif
        </nav>



    </div>
</div>

