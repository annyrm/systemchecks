<nav class="navbar navbar-default">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
                Cheques
            </a>
        </div>

        @if( true || Auth::check() )
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li{{ Request::is('cheques*') && !Request::is('cheques')? ' class=active' : ''}}>
                    <a href="{{url('cheques')}}">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                        Dashboard
                    </a>
                </li>
                <li{{ Request::is('cheques/alta') ? ' class=active' : ''}}>
                    <a href="{{url('cheques/alta')}}">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        Nuevo Cheque
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('logout')}}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
        @endif
    </div>
</nav>
