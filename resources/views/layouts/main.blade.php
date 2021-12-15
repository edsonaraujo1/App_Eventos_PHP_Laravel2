<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title')</title>
        <!-- Fontes Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@forevolve/bootstrap-dark@1.0.0/dist/css/bootstrap-dark.min.css" /> -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css"> -->
        <!-- ion icon -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <link rel="stylesheet" href="/css/styles.css">
        <!-- <script src="/js/jquery-1.11.0.min.js"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"  crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/js/scripts.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="/css/dark-mode.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-ie11@5/css/bootstrap-ie11.min.css">
        <script src="https://cdn.jsdelivr.net/npm/ie11-custom-properties@4/ie11CustomProperties.min.js"></script>
         -->
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img class="nav-logo" src="/img/Logo_branco_contorno.png"></a>
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
        <p>Copyright &copy; {{ date("Y") }} {{ __('Plataforma') }} Utyum - Todos os direitos Reservados</p>
        <a href="#" data-toggle="modal" data-target="#meuModal" style="color: #16bfd0;">Termo de Privacidade</a>
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
    </body>
</html>


<!-- Modal -->
<div id="meuModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Conteúdo do modal-->
    <div class="modal-content">

      <!-- Cabeçalho do modal -->
      <div class="modal-header">
      <h5 class="modal-title text-success"><b>Política de Privacidade</b></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Corpo do modal -->
      <div class="modal-body">
        <p style="padding: 30px 25px 30px 25px; text-align: justify;">
         <b>1 - O QUE FAREMOS COM ESTA INFORMAÇÃO?</b><br>
            Quando você realiza alguma transação com nossa loja, como parte do processo de compra e venda, coletamos as  informações pessoais que você nos dá tais como: nome, e-mail e endereço. Quando você acessa nosso site, também  recebemos automaticamente o protocolo de internet do seu computador, endereço de IP, a fim de obter informações que  nos ajudam a aprender sobre seu navegador e sistema operacional. Email Marketing será realizado apenas caso você permita.  Nestes emails você poderá receber notícia sobre nossa loja, novos produtos e outras atualizações. <br><br><br>
         <b>2 - CONSENTIMENTO</b><br>
            Como vocês obtêm meu consentimento? Quando você fornece informações pessoais como nome, telefone  e endereço, para completar: uma transação, verificar seu cartão de crédito, fazer um pedido, providenciar  uma entrega ou retornar uma compra. Após a realização de ações entendemos que você está de acordo com a coleta  de dados para serem utilizados pela nossa empresa. Se pedimos por suas informações pessoais por uma razão secundária, como marketing, vamos lhe pedir diretamente por seu consentimento, ou lhe fornecer a oportunidade de dizer não. E caso você  queira retirar seu consentimento, como proceder? Se após você nos fornecer seus dados, você mudar de ideia, você pode retirar  o seu consentimento para que possamos entrar em contato, para a coleção de dados contínua, uso ou divulgação de suas informações,  a qualquer momento, entrando em contato conosco em utyum@utyum.com.br ou nos enviando uma correspondência em: Utyum Intelligent Systems - Rua Céara - CEP - 11065-430 - Santos - São Paulo <br><br><br>
         <b>3 - DIVULGAÇÃO</b><br> 
            Podemos divulgar suas informações pessoais caso sejamos obrigados pela lei para fazê-lo ou se você violar nossos Termos de Serviço. <br><br><br>
         <b>4 - SERVIÇOS DE TERCEIROS</b><br>
            No geral, os fornecedores terceirizados usados por nós irão apenas coletar, usar e divulgar suas informações na medida do necessário para permitir que eles realizem os serviços que eles nos fornecem. Entretanto, certos fornecedores de serviços terceirizados, tais como gateways de pagamento e outros processadores de transação de pagamento, têm suas próprias políticas de privacidade com respeito à informação que somos obrigados a fornecer para eles de suas transações relacionadas com compras. Para esses fornecedores, recomendamos que você leia suas políticas de privacidade para que você possa entender a maneira na qual suas informações pessoais serão usadas por esses fornecedores. Em particular, lembre-se que certos fornecedores podem ser localizados em ou possuir instalações que são localizadas em jurisdições diferentes que você ou nós. Assim, se você quer continuar com uma transação que envolve os serviços de um fornecedor de serviço terceirizado, então suas informações podem tornar-se sujeitas às leis da(s) jurisdição(ões) nas quais o fornecedor de serviço ou suas instalações estão localizados. Como um exemplo, se você está localizado no Canadá e sua transação é processada por um gateway de pagamento localizado nos Estados Unidos, então suas informações pessoais usadas para completar aquela transação podem estar sujeitas a divulgação sob a legislação dos Estados Unidos, incluindo o Ato Patriota. Uma vez que você deixe o site da nossa loja ou seja redirecionado para um aplicativo ou site de terceiros, você não será mais regido por essa Política de Privacidade ou pelos Termos de Serviço do nosso site. <br><br><br>
         <b>Links</b><br>
            Quando você clica em links na nossa loja, eles podem lhe direcionar para fora do nosso site. Não somos responsáveis pelas práticas de privacidade de outros sites e lhe incentivamos a ler as declarações de privacidade deles. <br><br><br>
         <b>5 - SEGURANÇA</b><br>
            Para proteger suas informações pessoais, tomamos precauções razoáveis e seguimos as melhores práticas da indústria para nos certificar que elas não serão perdidas inadequadamente, usurpadas, acessadas, divulgadas, alteradas ou destruídas.  Se você nos fornecer as suas informações de cartão de crédito, essa informação é criptografada usando tecnologia  secure socket layer (SSL) e armazenada com uma criptografia AES-256. Embora nenhum método de transmissão pela Internet ou armazenamento eletrônico é 100% seguro, nós seguimos todos os requisitos da PCI-DSS e implementamos padrões adicionais geralmente aceitos pela indústria. <br><br><br>
         <b>6 - ALTERAÇÕES PARA ESSA POLÍTICA DE PRIVACIDADE</b><br>
            Reservamos o direito de modificar essa política de privacidade a qualquer momento, então por favor, revise-a com frequência. Alterações e esclarecimentos vão surtir efeito imediatamente após sua publicação no site. Se fizermos alterações de materiais para essa política, iremos notificá-lo aqui que eles foram atualizados, para que você tenha ciência sobre quais informações coletamos, como as usamos, e sob que circunstâncias, se alguma, usamos e/ou divulgamos elas. Se nossa loja for adquirida ou fundida com outra empresa, suas informações podem ser transferidas para os novos proprietários para que possamos continuar a vender produtos para você.
        </p>
      </div>

      <!-- Rodapé do modal-->
      <div class="modal-footer">
      <button type="button" data-dismiss="modal" class="btn btn-success">Fechar</button>
      </div>

    </div>
  </div>
</div>