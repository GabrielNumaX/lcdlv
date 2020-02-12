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

        //en este div va al ID y el data-type="foto"

        const imgDiv = document.createElement('div');

        $(imgDiv).attr('class', 'div-img');

        $(imgDiv).attr('id', 'f-'+obj.id);

        $(imgDiv).attr('data-type', 'foto');

        const img = document.createElement('img');

        $(img).attr('class', 'img-post')

        $(img).attr('src', obj.foto);

        $(imgDiv).append(img);

        const divDescription = document.createElement('div');

        $(divDescription).attr('class', 'div-desc');

        const description = document.createElement('p');

        $(description).html(obj.descripcion);

        $(description).attr('class', 'p-desc-no-show');

        // $(description).attr('id', 'descripcion');

        $(divDescription).append(description);

        const divClickDesc = document.createElement('div');

        $(divClickDesc).attr('class', 'div-p-click');

        const pShowClick = document.createElement('p');

        $(pShowClick).attr('class', 'p-show-click');

        $(pShowClick).html('Mostrar');

        $(divClickDesc).append(pShowClick);

        const formComments = document.createElement('form');

        $(formComments).attr('class', 'form-comments');

        $(formComments).prop('method', 'post');

        const inputComments = document.createElement('input');

        $(inputComments).attr('class', 'input-comments');

        $(inputComments).prop('type', 'text');

        $(inputComments).prop('placeholder', 'Escribe un comentario...');
        
        $(formComments).append(inputComments);

        $(article).append(h2Title, divTime, imgDiv, divDescription, divClickDesc, formComments);

        $(postContainer).append(article);

    
    }

    function loadVideos(obj) {
        
        const postContainer = $('.post-container');

        const article = document.createElement('article');

        $(article).attr('class', 'article-post');

        const h2Title = document.createElement('h2');

        $(h2Title).attr('class', 'h2-title');

        $(h2Title).html(obj.titulo) //obj.title

        const divTime = document.createElement('div');

        $(divTime).attr('class', 'div-time');

        const time = document.createElement('time');

        $(time).attr('class', 'time-post');

        $(time).html(obj.fecha) //obj.fecha

        $(divTime).append(time);

        //aca va el ID y el data-type="video";

        const divVideo = document.createElement('div');

        $(divVideo).attr('class', 'div-img');

        $(divVideo).attr('id', 'v-'+obj.id);

        $(divVideo).attr('data-type', 'video');

        const video = document.createElement('video');

        $(video).attr('class', 'video-post');

        //recordar que pone el id en el video 
        //no en el div
        $(video).attr('id', obj.id);

        $(video).attr('src', obj.video ) //obj.video

        $(video).prop('controls', true);

        //probar que type tiene como prop

        $(divVideo).append(video);

        const divDescription = document.createElement('div');

        $(divDescription).attr('class', 'div-desc');

        const description = document.createElement('p');

        $(description).html(obj.descripcion);

        $(description).attr('class', 'p-desc-no-show');

        // $(description).attr('id', 'descripcion');

        $(divDescription).append(description);

        const divClickDesc = document.createElement('div');

        $(divClickDesc).attr('class', 'div-p-click');

        const pShowClick = document.createElement('p');

        $(pShowClick).attr('class', 'p-show-click');

        $(pShowClick).html('Mostrar');

        $(divClickDesc).append(pShowClick);

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

        $(article).append(h2Title, divTime, divVideo, divDescription, divClickDesc, form);

        $(postContainer).append(article);

    }

    function loadNotes(obj) {

        const postContainer = $('.post-container');

        const article = document.createElement('article');

        $(article).attr('class', 'article-notas');

        //aca va el ID y el data-type="nota"

        const divNota = document.createElement('div');

        $(divNota).attr('class', 'nota')

        $(divNota).attr('id', 'n-'+obj.id);

        $(divNota).attr('data-type', 'nota');

        const h3Nota = document.createElement('h3');

        $(h3Nota).html(obj.titulo) //titulo nota

        $(h3Nota).attr('class', 'h3-nota');

        const pNota = document.createElement('p');

        $(pNota).attr('class', 'p-nota');

        $(pNota).html(obj.nota) // obj.nota

        //faltaria todo lo de los comentarios
        //AQUI COMENTARIOS

        $(divNota).append(h3Nota, pNota);

        const formComments = document.createElement('form');

        $(formComments).attr('class', 'form-comments');

        $(formComments).prop('method', 'post');

        const inputComments = document.createElement('input');

        $(inputComments).attr('class', 'input-comments');

        $(inputComments).prop('type', 'text');

        $(inputComments).prop('placeholder', 'Escribe un comentario...');
        
        $(formComments).append(inputComments);

        $(article).append(divNota, formComments);

        $(postContainer).append(article);


    }


    //this is for dynamic loading of content

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
    $('.post-container').on('click', '.p-show-click', function () {
        
        let desc = $('.div-desc p');

        // alert('click');

        // console.log($(this));

        //arreglar cuando scrollea el texto de la descripcion
        //que baja a la base de la foto o al top del texto descripcion

        const imgToScrollTo = $(this).parent().prev().prev().children();

        const divToScrollTo = $(this).parent().prev().children();

        // console.log(imgToScrollTo);

        // console.log(divToScrollTo);


        if($(desc).hasClass('p-desc-no-show')){

            $(desc).removeClass('p-desc-no-show');

            $(desc).addClass('p-desc-show');

            $('.p-show-click').html('Ocultar');

            // $('html, body').animate({
            //     scrollTop: $(divToScrollTo).offset().top
            // }, 1000);

            // $('html, body').animate({
            //     scrollTop: $(divToScrollTo).scrollTop(50)
            // }, 1000);

            //this solves the scrolling issue
            // $('html, body').scrollTop(divToScrollTo.offset().top);

            $(imgToScrollTo).scrollTop(divToScrollTo.offset().top);

        }
        else if($(desc).hasClass('p-desc-show')){

            $(desc).removeClass('p-desc-show');

            $(desc).addClass('p-desc-no-show');

            $('.p-show-click').html('Mostrar');

            // $('html, body').animate({
            //     scrollTop: $(imgToScrollTo).offset().top
            // }, 700);   
            
            //this solves the scrolling issue
            // $('html, body').scrollTop(imgToScrollTo.offset().top);

            $(divToScrollTo).scrollTop(imgToScrollTo.offset().top);
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

      //function postear comments

      $('.post-container').on('submit', '.form-comments', function(e) {


        //esto es para que no haga reload pero no va a cargar el comentario
        //salvo que refresce o añada la tabla de los comments
        e.preventDefault();

        let inputVal = $(this).children().val();

        if(inputVal === ""){

            // alert('no empty string')

            return false;
        }

        else {

            inputVal = inputVal.trim();

            console.log(inputVal);

        // const cargarComentario = `${protocol}//${URLmaster}/Home/cargar_comentario`;

        // console.log(cargarComentario);

        $.ajax({
            type: 'POST',
            dataType: 'text',
            contentType: 'application/x-www-form-urlencoded',
            url: 'index.php',
            data: { input: inputVal}, 
            success: function(data) {
                alert('comentario exitoso');
                //da undefined porque es asychronous
                // alert(data.input);          
            },
            error: function() {
                alert('se produjo un error cancerigeno');
            }

        });    

        //esto borra el text del input
        $(this).children().val("");

        }

        

      }); // end comments function


      //function para buscar ver si se hace o no

      $('.form-search').on('submit', function(e) {


        // esto no iria se tendria q mostrar los
        //resultados al recargar la pagina
        e.preventDefault();

        const searchVal = $('.input-search').val();

        console.log(searchVal);

        $.ajax({
            type: 'GET',
            dataType: 'text',
            contentType: 'application/x-www-form-urlencoded',
            url: 'index.php',
            data: { search: searchVal}, 
            success: function(data) {
                alert('busqueda exitosa');
                //da undefined porque es asychronous
                // alert(data.input);          
            },
            error: function() {
                alert('se produjo un error buscarioso');
            }

        });    

      })// end search form function

}); //end JQuery