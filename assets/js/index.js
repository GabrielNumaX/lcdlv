$(document).ready(function() {

    console.log('script loaded');

    //this is to show/hide post description
    //when clicked scroll out WILL TRY TO FIX
    $('.p-show-click').on('click', function () {
        
        let desc = $('.div-desc p');

        const elemToScrollTo = $(this).parent().prev().prev().children();

        // console.log(elemToScrollTo);


        if($(desc).hasClass('p-desc-no-show')){

            $(desc).removeClass('p-desc-no-show');

            $(desc).addClass('p-desc-show');

            $('.p-show-click').html('Ocultar');

            // $('html, body').animate({
            //     scrollTop: $(elemToScrollTo).offset().top
            // }, 1500);

            //this solves the scrolling issue
            $('html, body').scrollTop(elemToScrollTo.offset().top);

        }
        else if($(desc).hasClass('p-desc-show')){

            $(desc).removeClass('p-desc-show');

            $(desc).addClass('p-desc-no-show');

            $('.p-show-click').html('Mostrar');

            // $('html, body').animate({
            //     scrollTop: $(elemToScrollTo).offset().top
            // }, 1500);   
            
            //this solves the scrolling issue
            $('html, body').scrollTop(elemToScrollTo.offset().top);
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