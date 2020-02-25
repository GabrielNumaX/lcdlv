$(document).ready(function() {

    console.log('script loaded');

    // let commentFromLocal;

    // if(!localStorage.getItem('commentCounter')){

    //     let commentCounter = 4;
    
    //     localStorage.setItem('commentCounter', JSON.stringify(commentCounter));

    //     // console.log('if')
    // }
    // else {
    //     commentFromLocal = JSON.parse(localStorage.getItem('commentCounter'));

    //     // console.log('else');
    // }

    // console.log(localStorage.getItem('commentCounter'));

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

        if(obj.descripcion.length >=45){

            const pShowClick = document.createElement('p');

            $(pShowClick).attr('class', 'p-show-click');

            $(pShowClick).html('Mostrar');

            $(divClickDesc).append(pShowClick);
        }

        const formComments = document.createElement('form');

        $(formComments).attr('class', 'form-comments');

        $(formComments).prop('method', 'post');

        const inputComments = document.createElement('input');

        $(inputComments).attr('class', 'input-comments');

        $(inputComments).prop('type', 'text');

        $(inputComments).prop('placeholder', 'Escribe un comentario...');

        $(formComments).append(inputComments);

        //aca los comments

        const tableComments = document.createElement('table');

        $(tableComments).attr('class', 'table-comments');

        // const commentCounter = JSON.parse(localStorage.getItem('commentCounter'));

        const commentCounter = 5;

        if (Array.isArray(obj.comentarios) && obj.comentarios.length) {

            createComments(tableComments, obj.comentarios, commentCounter);

        }

        if(obj.comentarios.length > commentCounter){

            const divShowComment = document.createElement('div');

            $(divShowComment).attr('class', 'show-more-comments');

            const spanMoreComments = document.createElement('span');

            $(spanMoreComments).attr('class', 'span-more-comments');

            $(spanMoreComments).html('Mostrar mas comentarios');

            $(divShowComment).append(spanMoreComments);

            $(article).append(h2Title, divTime, imgDiv, divDescription, 
                divClickDesc, formComments, tableComments, divShowComment);
    
        }
        else {

            $(article).append(h2Title, divTime, imgDiv, divDescription, 
                divClickDesc, formComments, tableComments);

        }

        //fin comments

        $(postContainer).append(article);

    } // end loadPhotos()

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

        //esto crea el input para el comentario

        const form = document.createElement('form');

        $(form).attr('class', 'form-comments');

        const inputComment = document.createElement('input');

        $(inputComment).attr('class', 'input-comments');

        $(inputComment).prop('type', 'text');

        $(inputComment).prop('placeholder', 'Escribe un comentario...');

        $(inputComment).attr('data-tipo', obj.tipo);

        $(form).append(inputComment);

        //aca los comments

        const tableComments = document.createElement('table');

        $(tableComments).attr('class', 'table-comments');

        if (Array.isArray(obj.comentarios) && obj.comentarios.length) {

            // console.log('inside if')
            
            for(let i = obj.comentarios.length - 1; i >= 0; i--){

                // console.log(obj.comentarios[i].comentario)

                const tr = document.createElement('tr');

                const td = document.createElement('td');

                $(td).attr('class', 'comments');

                const pComment = document.createElement('p');

                $(pComment).attr('class', 'p-comments-no-show');

                $(pComment).html(obj.comentarios[i].comentario);

                if(obj.comentarios[i].comentario.length >= 45){

                    const spanShowComm = document.createElement('span');

                    $(spanShowComm).attr('class', 'show-comments');

                    $(spanShowComm).html('Mostrar Mas...');

                    $(td).append(pComment, spanShowComm);

                }
                else {

                    $(td).append(pComment);

                }

                $(tr).append(td);

                $(tableComments).append(tr);
            }


        }

        //fin comments

        $(article).append(h2Title, divTime, divVideo, divDescription, divClickDesc, form, tableComments);

        $(postContainer).append(article);

    } //end loadVideos();

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

        $(divNota).append(h3Nota, pNota);

        const formComments = document.createElement('form');

        $(formComments).attr('class', 'form-comments');

        $(formComments).prop('method', 'post');

        const inputComments = document.createElement('input');

        $(inputComments).attr('class', 'input-comments');

        $(inputComments).prop('type', 'text');

        $(inputComments).prop('placeholder', 'Escribe un comentario...');

        $(formComments).append(inputComments);

        //aca los comments

        const tableComments = document.createElement('table');

        $(tableComments).attr('class', 'table-comments');

        if (Array.isArray(obj.comentarios) && obj.comentarios.length) {

            // console.log('inside if')
            
            for(let i = obj.comentarios.length - 1; i >= 0; i--){

                // console.log(obj.comentarios[i].comentario)

                const tr = document.createElement('tr');

                const td = document.createElement('td');

                $(td).attr('class', 'comments');

                const pComment = document.createElement('p');

                $(pComment).attr('class', 'p-comments-no-show');

                $(pComment).html(obj.comentarios[i].comentario);

                if(obj.comentarios[i].comentario.length >= 40){

                    const spanShowComm = document.createElement('span');

                    $(spanShowComm).attr('class', 'show-comments');

                    $(spanShowComm).html('Mostrar Mas...');

                    $(td).append(pComment, spanShowComm);

                }
                else {

                    $(td).append(pComment);

                }

                $(tr).append(td);

                $(tableComments).append(tr);
            }


        }

        //fin comments

        $(article).append(divNota, formComments, tableComments);

        $(postContainer).append(article);

    } //end loadNotes();


    //this is for dynamic loading of content

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const cargarTodo = `${protocol}//${URLmaster}/Home/cargar_todo`;

    $.get(cargarTodo, function(data, status) {

        const dataParse = JSON.parse(data)

        //esto es para guardar el json para cargar mas comentarios
        localStorage.setItem('lcdlv', data);

        let commentCountArray = [];

        //aca habria que hacer un for con el json y
        //filtrar por foto video o nota y usar las functions
        for(let i = 0; i < dataParse.length; i++){

            //esto es para el array del localStorage
            const obj = {
                id: dataParse[i].id,
                tipo: dataParse[i].tipo,
                counter: 10,
                comentarios: [...dataParse[i].comentarios]
            }

            commentCountArray.push(obj);

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


        console.log(commentCountArray);

        localStorage.setItem('counterArray', JSON.stringify(commentCountArray));

        console.log(dataParse);

    });

    //function to create comments
    function createComments(table, arrayComments, commentCounter){

        // console.log(arrayComments);

        for(let i = arrayComments.length - 1; i >= arrayComments.length
            - commentCounter; i--){

            // console.log(obj.comentarios[i].comentario)

            const tr = document.createElement('tr');

            const td = document.createElement('td');

            $(td).attr('class', 'comments');

            const pComment = document.createElement('p');

            $(pComment).attr('class', 'p-comments-no-show');

            $(pComment).html(arrayComments[i].comentario);

            if(arrayComments[i].comentario.length >= 45){

                const spanShowComm = document.createElement('span');

                $(spanShowComm).attr('class', 'show-comments');

                $(spanShowComm).html('Mostrar Mas...');

                $(td).append(pComment, spanShowComm);

            }
            else {

                $(td).append(pComment);
            }

            $(tr).append(td);

            $(table).append(tr);
        }
    } //end createComments()

    //esta function carga mas comments comparando con el array de obj del
    //localStorage (id, tipo, counter, y elemento para vaciar)
    function loadMoreComments(table, commentsArray, id, tipo, parentEmpty) {

        // console.log('inside load+comm');

        for(let i = 0; i < commentsArray.length; i++){

            if(commentsArray[i].id === id && commentsArray[i].tipo === tipo){

                if(commentsArray[i].counter >= commentsArray[i].comentarios.length){

                    commentsArray[i].counter = commentsArray[i].comentarios.length;

                    createComments(table, commentsArray[i].comentarios, commentsArray[i].counter);
                    
                    parentEmpty.empty();
        
                }
                else {
                createComments(table, commentsArray[i].comentarios, commentsArray[i].counter);

                commentsArray[i].counter = commentsArray[i].counter + 4;

                // console.log(commentsArray[i].counter);
                }

            }
        }

        localStorage.setItem('counterArray', JSON.stringify(commentsArray));

        // console.log(commentsArray);
    }


  
    //esta es la func para cargar mas comments anda pero medio cancer
    //faltaria guardar en el localStorage un obj que tenga el id y tipo 
    //de elemento con su respectivo contador
    //y probar q no se rompa sin comentarios!!!
    //MUY IMPORTANTE ESTO
    //ESTO DE ARRIBA YA ESTA Y NO SE ROMPE SIN COMMENTS
    $('.post-container').on('click', '.span-more-comments', function() {

        let commentsArray = JSON.parse(localStorage.getItem('counterArray'));

        const divElement = $(this).parent().siblings('.div-img');

        const type = $(divElement).attr('data-type');

        const id = $(divElement).attr('data-id');

        const table = $(this).parent().siblings('.table-comments');

        $(table).empty();

        const parentEmpty = $(this).parent();

        loadMoreComments(table, commentsArray, id, type, parentEmpty)

    }) //end loadMoreComments();

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
    $('.post-container').on('click','.show-comments', function() {

        let comment = $(this).prev();


        if($(comment).hasClass('p-comments-no-show')){

            $(comment).removeClass('p-comments-no-show');

            $(comment).addClass('p-comments-show');

            $(this).html('Ocultar comentario');
        }
        else if ($(comment).hasClass('p-comments-show')){

            $(comment).removeClass('p-comments-show');

             $(comment).addClass('p-comments-no-show');

             $(this).html('Mostrar Mas...');
        }

      }); //end show/no show

      //function postear comments

      $('.post-container').on('submit', '.form-comments', function(e) {

        //esto es para que no haga reload pero no va a cargar el comentario
        //salvo que refresce o añada la tabla de los comments

        e.preventDefault();

        let inputVal = $(this).children().val();

        let tipo, id;

        const sibling = $(this).siblings();

        if($(sibling).hasClass('div-img')){

            tipo = $(this).siblings('.div-img').attr('data-type');

            id = $(this).siblings('.div-img').attr('data-id');
        }

        else if($(sibling).hasClass('nota')){

            tipo = $(this).siblings('.nota').attr('data-type');

            id = $(this).siblings('.nota').attr('data-id');
        }

        if(inputVal === ""){

            return false;
        }
        else {

            inputVal = inputVal.trim();

            let data = new FormData();

            data.append('comentario', inputVal);
            data.append('tipo', tipo);
            data.append('id', id);

            const subirComentario = `${protocol}//${URLmaster}/Comentarios/subir_comentario`;

            const table = $(this).siblings('.table-comments');

            console.log(table);

        $.ajax({
            type: 'POST',
            dataType: 'text',
            contentType: 'application/x-www-form-urlencoded',
            url: subirComentario,
            data: data,
            processData: false,
            contentType: false,
            //solo dejamos el error!
            success: function() {

                // $(this).children().val("");

                const scroll = $(window).scrollTop();

                //aca hay que recargar la tabla de coments con el id, tipo y comentario 
                //o mjor dicho hacerle un prepend

                // const table = $(this).siblings('.table-comments');

                const tr = document.createElement('tr');

                const td = document.createElement('td');

                $(td).attr('class', 'comments');

                const pComment = document.createElement('p');

                $(pComment).attr('class', 'p-comments-no-show');

                $(pComment).html(inputVal);

                if(inputVal.length >= 40){

                    // alert('if');

                    const spanShowComm = document.createElement('span');

                    $(spanShowComm).attr('class', 'show-comments');

                    $(spanShowComm).html('Mostrar Mas...');

                    $(td).append(pComment, spanShowComm);

                }
                else {

                    $(td).append(pComment);
                }

                $(tr).append(td);

                $(table).prepend(tr);

                $("html").scrollTop(scroll);
                
            },
            error: function() {
              //igual es al pedo el error se va a dar cuenta cuando no comente! ja
                alert('Ha ocurrido un error');
            }

        });

        //esto borra el text del input
        $(this).children().val("");

        // console.log(scroll);

        // $("html").scrollTop(scroll);

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
