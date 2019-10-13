$(document).ready(function() {

    console.log('script loaded');

    //this is to show/hide post description
    $('.p-show-click').on('click', function () {
        
        let desc = $('.div-desc p');

        // console.log( $(desc));

        if($(desc).hasClass('p-desc-no-show')){

            $(desc).removeClass('p-desc-no-show');

            $(desc).addClass('p-desc-show');

            $('.p-show-click').html('Ocultar');
        }
        else if($(desc).hasClass('p-desc-show')){

            $(desc).removeClass('p-desc-show');

            $(desc).addClass('p-desc-no-show');

            $('.p-show-click').html('Mostrar');
        }
    });

    //this event is to hide or show comments according to click 
    //on span .show-comments
    $('.show-comments').on('click', function() {

        let comment = $(this).prev();


        if($(comment).hasClass('p-comments-no-show')){

            $(comment).removeClass('p-comments-no-show');

            $(comment).addClass('p-comments-show');

            $(this).html('Ocultar comentario');
        }
        else if ($(comment).hasClass('p-comments-show')){

            $(comment).removeClass('p-comments-show');

             $(comment).addClass('p-comments-no-show');

             $(this).html('Mostrar comentario');
        }
        
      }); //end show/no show

}); //end JQuery