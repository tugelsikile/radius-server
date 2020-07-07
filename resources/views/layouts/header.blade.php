<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <span class="logo-mini"><b>RA</b>D</span>
        <span class="logo-lg"><b>RADIUS</b>KU</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/avatar.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('images/avatar.jpg') }}" class="img-circle" alt="User Image">

                            <p>
                                {{ auth()->user()->name }}
                                <small>Member since {{ auth()->user()->created_at }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form method="post" action="{{ route('logout') }}" style="display: none" id="logoutForm">
                                    @csrf
                                </form>
                                <a href="#" onclick="$('#logoutForm').submit()" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>