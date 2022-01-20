<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title')</title>
        <!-- Fontes Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel='stylesheet' href='https://jacoblett.github.io/bootstrap4-latest/bootstrap-4-latest.min.css'>
        <!-- ion icon -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/css/dark-mode.css">
        <script src="/js/scripts.js"></script>
        <script src="/js/validator.js"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img class="nav-logo img-responsive" src="/img/Logo_branco_contorno.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-right" id="navbarTogglerDemo02">
                    <ul class="navbar-nav  nav-pills justify-content-end ml-auto">
                        <li class="nav-item active">
                        <a href="/" class="nav-link">{{__('evnetos')}}</a>
                        </li>
                        <li class="nav-item">
                        <a href="/events/create" class="nav-link">{{__('criar')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contact" class="nav-link">{{__('Contato')}}</a>
                        </li>
                        @auth
                        <li class="nav-item">
                        <a href="/dashboard" class="nav-link">{{__('meuevento')}}</a>
                        </li>
                        <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                                class="nav-link"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                            {{__('sair')}}
                            </a>
                        </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">{{__('entrar')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">{{__('cadastrar')}}</a>
                        </li>
                        @endguest
                        <li class="nav-item dropleft">
                            <a id="navbarDropdown" class="nav-link dropdow-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="flag-icon" src="{{__('/img/icon/'.app()->getLocale().'.png')}}" style="width: 30px; height: 25px;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-rigth" aria-labelledby="navbarDropdown">
                                @if(app()->getLocale()=='pt')
                                <a href="{{ url('locale/en')}}" class="dropdown-item"><img src="{{__('/img/icon/en.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('english')}}</a>
                                <a href="{{ url('locale/ch')}}" class="dropdown-item"><img src="{{__('/img/icon/ch.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('china')}}</a>
                                @endif
                                @if(app()->getLocale()=='en')
                                <a href="{{ url('locale/pt')}}" class="dropdown-item"><img src="{{__('/img/icon/pt.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('portugues')}}</a>
                                <a href="{{ url('locale/ch')}}" class="dropdown-item"><img src="{{__('/img/icon/ch.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('china')}}</a>
                                @endif
                                @if(app()->getLocale()=='ch')
                                <a href="{{ url('locale/pt')}}" class="dropdown-item"><img src="{{__('/img/icon/pt.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('portugues')}}</a>
                                <a href="{{ url('locale/en')}}" class="dropdown-item"><img src="{{__('/img/icon/en.png')}}" style="width: 30px; height: 25px;">&nbsp;{{__('english')}}</a>
                                @endif
                            </div>
                        </li>
                        <li><img src="/img/moon.png" id="icon" class="icon_lua" style="width:30px;" ></li>
                    </ul>
                </div>
            </nav>
        <main>
            <div class="container-fluid">
                @if(session('msg'))
                  <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </main>
    <footer>
        <a href="/" class="navbar-brand">
        <img class="img-footer" src="/img/Logo_branco_contorno.png" alt="Plataforma Utyum">
        </a>
        <p>{{ __('Copyright') }} &copy; {{ date("Y") }} {{ __('Plataforma') }} Utyum - {{ __('Todos os direitos Reservados') }}</p>
        <a href="#" data-toggle="modal" data-target="#meuModal" style="color: #16bfd0;">{{ __('Termo de Privacidade') }}</a>
        <p class="social">
           <a href="https://www.facebook.com/utyumsistemas/" target="_blank">
           <ion-icon class="ion-icon-social"  name="logo-facebook"></ion-icon>
           </a>
           <a href="https://twitter.com/utyumsistemas/" target="_blank">
           <ion-icon class="ion-icon-social"  name="logo-twitter"></ion-icon>
           </a>
           <a href="https://www.instagram.com/utyumsistemas/" target="_blank">
           <ion-icon class="ion-icon-social"  name="logo-instagram"></ion-icon>
           </a>
           <a href="https://www.youtube.com/channel/UCYhRps5c7eXrKmgLgtShXkA?view_as=subscriber" target="_blank">
           <ion-icon class="ion-icon-social"  name="logo-youtube"></ion-icon>
           </a>
           <a href="https://www.linkedin.com/company/utyumsystems" target="_blank">
           <ion-icon class="ion-icon-social"  name="logo-linkedin"></ion-icon>
           </a>
           <a href="https://wa.me/5511972787731" target="_blank">
           <ion-icon class="ion-icon-social"  name="logo-whatsapp"></ion-icon>
           </a>
        </p>
    </footer>
    <script src="/js/dark-mode.js"></script>
    <div id="scrollToTop"><ion-icon class="ion_scrollToTop" name="caret-up-circle-outline" alt="Ir para o Topo"></ion-icon></i></div>
    <!-- @yield('js') -->
    </body>
</html>
<!-- Modal -->
<div id="meuModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Conteúdo do modal-->
    <div class="modal-content">

      <!-- Cabeçalho do modal -->
      <div class="modal-header">
      <h5 class="modal-title text-success"><b>{{ __('Política de Privacidade') }}</b></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Corpo do modal -->
      <div class="modal-body">
        <p style="padding: 30px 25px 30px 25px; text-align: justify;">
         <b>{{ __('Privacidade titulo 1') }} </b><br>
            {{ __('Privacidade texto 1') }}  <br><br>
         <b>{{ __('Privacidade titulo 2') }} </b><br>
            {{ __('Privacidade texto 2') }}  <br><br>
         <b>{{ __('Privacidade titulo 3') }} </b><br> 
            {{ __('Privacidade texto 3') }}  <br><br>
         <b>{{ __('Privacidade titulo 4') }} </b><br>
            {{ __('Privacidade texto 4') }}  <br><br>
         <b>{{ __('Privacidade titulo 4a') }}</b><br>
            {{ __('Privacidade texto 4a') }} <br><br>
         <b>{{ __('Privacidade titulo 5') }} </b><br>
            {{ __('Privacidade texto 5') }}  <br><br>
         <b>{{ __('Privacidade titulo 6') }} </b><br>
            {{ __('Privacidade texto 6') }}  
        </p>
      </div>

      <!-- Rodapé do modal-->
      <div class="modal-footer">
      <button type="button" data-dismiss="modal" class="btn btn-success">{{ __('Fechar') }}</button>
      </div>

    </div>
  </div>
</div>