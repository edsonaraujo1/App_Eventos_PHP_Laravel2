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