<!DOCTYPE html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/mangas.css') !!}
        {!! Html::style('assets/css/bootstrap-theme.css') !!}
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">Oeuvres</a>
                    </div>
                    @if(Session::get('id') == '')
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav navbar-right">                             
                            <li><a href="{{ url('getLogin') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                        </ul>
                    </div>
                    @else
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav">                           
                            <li><a href="{{ url('/listerOeuvres') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
                            <li><a href="{{ url('/getFormOeuvre/0') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter</a></li>
                            <li><a href="{{ url('/listerReservations') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Réservations</a></li>                       
                        </ul>  
                        <ul class="nav navbar-nav navbar-right">                             
                            <li><a href="{{ url('signOut') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                        </ul>
                    </div>
                    @endif
                </div><!--/.container-fluid -->
            </nav>
        </div> 
        <div class="container">
            @yield('content')
        </div>
        {!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/ui-bootstrap-tpls.js') !!}
        {!! Html::script('assets/js/bootstrap.js') !!}
    </body>
</html>
