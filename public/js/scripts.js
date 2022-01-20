console.log("Deu Certo!!!");

$(document).ready(function() {

        $('#toTop').click(function() {
        $('html,body').animate({
            scrollTop: 0
        }, 1000);
    });

    var timer;
    $(window).bind('scroll', function() {
        clearTimeout(timer);
        timer = setTimeout(refresh, 50);
    });
    var refresh = function() {
        if ($(window).scrollTop() > 100) {
            $(".tagline").fadeTo("slow", 0);
        } else {
            $(".tagline").fadeTo("slow", 1);
        }
    };

});

$(document).ready(function() {
    $(window).scroll(function() { if ($(this).scrollTop() > 100) { $('#scrollToTop').fadeIn(); } else { $('#scrollToTop').fadeOut(); } });
    $('#scrollToTop').click(function() { $('html, body').animate({ scrollTop: 0 }, 800); return false; });
});


$(function() {
    // Pré-visualização de várias imagens no navegador
    var visualizacaoImagens = function(input, lugarParaInserirVisualizacaoDeImagem) {
    
        if (input.files) {
            var quantImagens = input.files.length;
    
            for (i = 0; i < quantImagens; i++) {
                var reader = new FileReader();
    
                reader.onload = function(event) {
                    $($.parseHTML('<img class="miniatura">')).attr('src', event.target.result).appendTo(lugarParaInserirVisualizacaoDeImagem);
                }
    
                reader.readAsDataURL(input.files[i]);
            }
        }
    
    };
    
    $('#image').on('change', function() {
        visualizacaoImagens(this, 'div.galeria');
    });
    });


    /* Função Validar */
function validar() {
  // pegando o valor do nome pelos names
  var credito = document.getElementById("credito");
  var title = document.getElementById("title");
  var date = document.getElementById("date");
  var city = document.getElementById("city");
  var description = document.getElementById("description");
  var fonte = document.getElementById("fonte");
  var items = document.getElementById("items").checked;

  // verificar se o nome está vazio
  if (credito.value == "") {
    alert("Nome não informado");

    // Deixa o input com o focus
    credito.focus();
    // retorna a função e não olha as outras linhas
    return;
  }
  if (title.value == "") {
    alert("Sobrenome não informado");
    title.focus();
    return;
  }
  if (date.value == "") {
    alert("E-mail não informado");
    date.focus();
    return;
  }
  if (city.value == "") {
    alert("Senha não informada");
    city.focus();
    return;
  }
  if (description.value == "") {
    alert("Telefone não informado");
    description.focus();
    return;
  }
  if (fonte.value == "") {
    alert("CEP não informado");
    fonte.focus();
    return;
  }
  if (items.value == "") {
    alert("CEP não informado");
    items.focus();
    return;
  }
  alert("Formulário enviado!");
  // envia o formulário
  //formulario.submit();
}