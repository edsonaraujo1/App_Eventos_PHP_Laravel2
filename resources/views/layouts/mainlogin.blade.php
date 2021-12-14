<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title')</title>
        <!-- Fontes Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- Bootstrap -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@forevolve/bootstrap-dark@1.0.0/dist/css/bootstrap-dark.min.css" /> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
        <!-- ion icon -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="/css/dark-mode.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-ie11@5/css/bootstrap-ie11.min.css">
        <script src="https://cdn.jsdelivr.net/npm/ie11-custom-properties@4/ie11CustomProperties.min.js"></script>
         -->
    </head>    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/Logo_branco_contorno.png" alt="Plataforma Utyum">
                    </a>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a href="/" class="nav-link">{{__('evnetos')}}</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus Eventos</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout"
                                    class="nav-link"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                 Sair
                                </a>
                            </form>
                        </li>
                        @endauth
                        @guest
                          <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        <li class="nav-item dropleft">
                            <a id="navbarDropdown" class="nav-link dropdow-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="flag-icon" src="{{__('img/icon/'.app()->getLocale().'.png')}}" style="width: 30px; height: 25px;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-rigth" aria-labelledby="navbarDropdown">
                                @if(app()->getLocale()=='pt')
                                <a href="{{ url('locale/en')}}" class="dropdown-item"><img src="{{__('img/icon/en.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('english')}}</a>
                                <a href="{{ url('locale/ch')}}" class="dropdown-item"><img src="{{__('img/icon/ch.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('china')}}</a>
                                @endif
                                @if(app()->getLocale()=='en')
                                <a href="{{ url('locale/pt')}}" class="dropdown-item"><img src="{{__('img/icon/pt.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('portugues')}}</a>
                                <a href="{{ url('locale/ch')}}" class="dropdown-item"><img src="{{__('img/icon/ch.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('china')}}</a>
                                @endif
                                @if(app()->getLocale()=='ch')
                                <a href="{{ url('locale/pt')}}" class="dropdown-item"><img src="{{__('img/icon/pt.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('portugues')}}</a>
                                <a href="{{ url('locale/en')}}" class="dropdown-item"><img src="{{__('img/icon/en.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('english')}}</a>
                                @endif
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
                <div class="form-check form-switch">
  <input type="checkbox" class="form-check-input" id="darkSwitch" />
  <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
</div>
<script src="/js/dark-mode-switch.min.js"></script>
            </nav>

        </header>
        <main>
            
                   @yield('content')

        </main>
    <footer>
        <p>Plataforma Utyum &copy; 2021</p>
    </footer>
    </body>
</html>