
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bug Tracker</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if (Sentry::check()) : ?>
                <ul class="nav navbar-nav">
                    <li class="{{ (Request::is('admin') ? 'active' : '') }}"><a href="{{ URL::to('admin') }}">Dashboard</a></li>
                    <li class="{{ (Request::is('admin/bugs*') ? 'active' : '') }}"><a href="{{ URL::route('bugs') }}">Bugs</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                </ul>
            <?php endif; ?>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>