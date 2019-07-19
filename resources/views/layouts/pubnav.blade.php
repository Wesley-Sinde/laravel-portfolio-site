<nav class="navbar navbar-expand-md navbar-light bg-secondary">
    <div class="container">
    <a class="navbar-brand" href="{{route('root')}}">Rick Collins-Web Developer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="projectDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="projectDropdown">
                        <a class="dropdown-item" href="{{route('project.new')}}">Add Project</a>
                            <a class="dropdown-item" href="{{route('project.index')}}">View All Projects</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('profile.show')}}">Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('skill.new')}}">Add New Skill</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                    @guest
                        <a class="nav-item nav-link" href="{{route('login')}}">Login</a>
                        @endguest
                <a class="nav-item nav-link" href="{{route('project.index')}}">Projects</a>
                <a class="nav-item nav-link" href="{{route('about')}}">About Me</a>
                <a class="nav-item nav-link" href="{{route('root')}}/#contact">Contact</a>
            </div>
        </div>
    </div>
</nav>
