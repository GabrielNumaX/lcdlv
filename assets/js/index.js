$(document).ready(function() {

    console.log('script loaded');

    //function to load photos

    function loadPhotos(obj) {

        const postContainer = $('.post-container');

        const article = document.createElement('article');

        $(article).attr('class', 'article-post');

        const h2Title = document.createElement('h2');

        $(h2Title).attr('class', 'h2-title');

        // console.log(obj[i])

        $(h2Title).html(obj.titulo);

        // console.log(h2Title);

        const divTime = document.createElement('div');

        const time = document.createElement('time');

        $(divTime).attr('class', 'div-time');

        $(time).html(obj.fecha);

        $(time).attr('class', 'time-post');

        $(divTime).append(time);

        const imgDiv = document.createElement('div');

        $(imgDiv).attr('class', 'div-img');

        const img = document.createElement('img');

        $(img).attr('class', 'img-post')

        $(img).attr('src', obj.foto);

        $(imgDiv).append(img);

        const divDescription = document.createElement('div');

        $(divDescription).attr('class', 'div-desc');

        const description = document.createElement('p');

        $(description).html(obj.descripcion);

        $(description).attr('class', 'p-desc-no-show');

        $(divDescription).append(description);

        $(postContainer).append(h2Title, divTime, imgDiv, divDescription);

    
    }

    function loadVideos(obj) {
        
        const postContainer = $('.post-container');

        const article = document.createElement('article');

        const h2Title = document.createElement('h2');

        $(h2Title).attr('class', 'h2-title');

        $(h2Title).html(obj.titulo) //obj.title

        const divTime = document.createElement('div');

        $(divTime).attr('class', 'div-time');

        const time = document.createElement('time');

        $(time).attr('class', 'time-post');

        $(time).html(obj.fecha) //obj.fecha

        $(divTime).append(time);

        const divVideo = document.createElement('div');

        $(divVideo).attr('class', 'div-img');

        const video = document.createElement('video');

        $(video).attr('class', 'video-post');

        //recordar que pone el id en el video 
        //no en el div
        $(video).attr('id', obj.id);

        $(video).attr('src', obj.video ) //obj.video

        $(video).prop('controls', true);

        //probar que type tiene como prop

        $(divVideo).append(video);

        //faltaria todo lo de los comentarios
        //AQUI COMENTARIOS

        //esto crea el input para el comentario

        const form = document.createElement('form');

        $(form).attr('class', 'form-comments');

        const inputComment = document.createElement('input');

        $(inputComment).attr('class', 'input-comments');

        $(inputComment).prop('type', 'text');

        $(inputComment).prop('placeholder', 'Escribe un comentario...');

        $(inputComment).attr('data-tipo', obj.tipo);

        $(form).append(inputComment);

        $(article).append(h2Title, divTime, divVideo, form);

        $(postContainer).append(article);

    }

    function loadNotes(obj) {

        const postContainer = $('.post-container');

        const article = document.createElement('article');

        $(article).attr('class', 'article-notas');

        const divNota = document.createElement('div');

        $(divNota).attr('class', 'nota')

        const h3Nota = document.createElement('h3');

        $(h3Nota).html(obj.titulo) //titulo nota

        $(h3Nota).attr('class', 'h3-nota');

        const pNota = document.createElement('p');

        $(pNota).attr('class', 'p-nota');

        $(pNota).html(obj.nota) // obj.nota

        //faltaria todo lo de los comentarios
        //AQUI COMENTARIOS

        $(divNota).append(h3Nota, pNota);

        $(article).append(divNota);

        $(postContainer).append(article);


    }


    //this is for dynamic loading of images

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;
    
    const cargarTodo = `${protocol}//${URLmaster}/Home/cargar_todo`;

    $.get(cargarTodo, function(data, status) {

        const dataParse = JSON.parse(data)

        //aca habria que hacer un for con el json y
        //filtrar por foto video o nota y usar las functions
        
        for(let i = 0; i < dataParse.length; i++){

            if(dataParse[i].tipo === "foto"){

                loadPhotos(dataParse[i]);
            }

            else if(dataParse[i].tipo === "video"){

                loadVideos(dataParse[i]);
            }

            else if(dataParse[i].tipo === "nota"){

                loadNotes(dataParse[i]);
            }
        }

        console.log(dataParse);
    });

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