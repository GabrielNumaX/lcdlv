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

        //aca va el ID y el data-type="foto"

        const imgDiv = document.createElement('div');

        $(imgDiv).attr('class', 'div-img');

        // $(imgDiv).attr('id', 'f-'+obj.id);

        $(imgDiv).attr('data-type', 'foto');

        $(imgDiv).attr('data-id', obj.id);

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

        //aca va en ID y el data-type="video"

        const divVideo = document.createElement('div');

        $(divVideo).attr('class', 'div-img');

        // $(divVideo).attr('id', 'v-'+obj.id);

        $(divVideo).attr('data-type', 'video');

        $(divVideo).attr('data-id', obj.id);

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

        // $(divNota).attr('id', 'n-'+obj.id);

        $(divNota).attr('data-type', 'nota');

        $(divNota).attr('data-id', obj.id);

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
        
        for(let i = dataParse.length - 1; i >= 0; i--){

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


}); //end jquery