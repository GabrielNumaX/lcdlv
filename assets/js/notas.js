$(document).ready(function() {


    //THIS IS DEBOUNCE FUNCTION COPIED FROM Wes Bos VIDEO 13  
    function debounce(func, wait = 30, inmediate = true)  {
    
        var timeout;
    
        return function() {
    
            var context = this, args = arguments;
    
            var later = function() {
        
            timeout = null;
    
            if(!inmediate) func.apply(context, args);
            
            };
    
            var callNow = inmediate && !timeout;
    
            clearTimeout(timeout);
    
            timeout = setTimeout(later, wait);
    
            if(callNow) func.apply(context, args);

        };

  }; //end debounce function

    //this is to remove aside position: fixed 
    //and show footer on scroll to bottom
    function showFooter() {

        let windowPos = $(window).scrollTop() + $(window).height() + $('#footer').height();

        const footerFixPos = $(document).height() - $('#footer').height(); //5800

        // console.log('window ' + windowPos);

        // console.log('footer ' + footerFixPos);

        if(windowPos > footerFixPos) {

            // console.log('if saca show');

            $('#aside').removeClass('aside-show');

            $('#aside').addClass('aside-no-show');

        }
        else if (windowPos < footerFixPos) {

            // console.log('else saca no show');
        
            $('#aside').removeClass('aside-no-show');

            $('#aside').addClass('aside-show');
            
        }  
    }

    window.addEventListener('scroll', debounce(showFooter));

    //esto es para la carga dynamic de las notas

    function loadNotes(obj) {

        const main = $('#main');

        const article = document.createElement('article');

        $(article).attr('class', 'article-notas');

        //aca va el ID y el data-type="nota"

        const divNota = document.createElement('div');

        $(divNota).attr('class', 'nota')

        $(divNota).attr('id', 'n-'+obj.id);

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

        //aca los comments

        const tableComments = document.createElement('table');

        $(tableComments).attr('class', 'table-comments');

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

            $(article).append(divNota, formComments, tableComments, divShowComment);
    
        }
        else {

            $(article).append(divNota, formComments, tableComments);

        }

        //fin comments

        $(main).append(article);

    } //end loadNotes();


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
    $('#main').on('click', '.span-more-comments', function() {

        let commentsArray = JSON.parse(localStorage.getItem('counterArray'));

        let divElement = $(this).parent().siblings();
        
        if($(divElement).hasClass('div-img')){

            divElement = $(this).parent().siblings('.div-img');
        }
        else if ($(divElement).hasClass('notas')){

            divElement = $(this).parent().siblings('.notas');
        }

        // console.log(divElement);

        const type = $(divElement).attr('data-type');

        const id = $(divElement).attr('data-id');

        const table = $(this).parent().siblings('.table-comments');

        $(table).empty();

        const parentEmpty = $(this).parent();

        loadMoreComments(table, commentsArray, id, type, parentEmpty)

    }) //end load more comments SPAN click;

    function asideNotes(obj) {

        const ul = $('.ul-notas');

        const li = document.createElement('li')

        $(li).attr('class', 'li-notas');

        const a = document.createElement('a');

        // $(a).attr('class', 'li-notas-a');

        //recordar que esto viene del ID de carga dynamic de arriba
        //loadNotes();

        $(a).prop('href', '#n-'+obj.id);

        $(a).html(obj.titulo);

        $(li).append(a);

        $(ul).append(li);

    }

    function asideDates(obj){

        const ul = $('.ul-fechas');

        const li = document.createElement('li');

        $(li).attr('class', 'li-fechas');

        const date = obj.fecha.slice(0, 10);

        $(li).html(date);

        $(ul).append(li);

    }

    //this is for dynamic loading of content

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;
    
    const cargarTodo = `${protocol}//${URLmaster}/Home/cargar_todo`;

    $.get(cargarTodo, function(data, status) {

        const dataParse = JSON.parse(data)

        localStorage.setItem('lcdlv', data);

        let commentCountArray = [];
        
        for(let i = 0; i < dataParse.length; i++){

            //esto es para el array del localStorage
            const obj = {
                id: dataParse[i].id,
                tipo: dataParse[i].tipo,
                counter: 10,
                comentarios: [...dataParse[i].comentarios]
            }

            commentCountArray.push(obj);

            let noteCount = 0;

            if(dataParse[i].tipo === "nota"){

                loadNotes(dataParse[i]);

                if(noteCount < 15) {

                    asideNotes(dataParse[i]);

                    asideDates(dataParse[i]);

                    noteCount++;
                }
            }
        }

        console.log(commentCountArray);

        localStorage.setItem('counterArray', JSON.stringify(commentCountArray));

        console.log(dataParse);
    });

    //la funcion para mostrar mas comentarios esta en index.js
    //COPIAR Y PEGAR

    //this event is to hide or show comments according to click
    //on span .show-comments
    $('#main').on('click','.show-comments', function() {

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

      $('#main').on('submit', '.form-comments', function(e) {

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

            // console.log(inputVal);
            // console.log(tipo);
            // console.log(id);

        const subirComentario = `${protocol}//${URLmaster}/Comentarios/subir_comentario`;

        const table = $(this).siblings('.table-comments');

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
                
                const scroll = $(window).scrollTop();

                //aca hay que recargar la tabla de coments con el id, tipo y comentario 
                //o mejor dicho hacerle un prepend

                const tr = document.createElement('tr');

                const td = document.createElement('td');

                $(td).attr('class', 'comments');

                const pComment = document.createElement('p');

                $(pComment).attr('class', 'p-comments-no-show');

                $(pComment).html(inputVal);

                if(inputVal.length >= 40){

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

                $('html').scrollTop(scroll);
            },
            error: function() {
              //igual es al pedo el error se va a dar cuenta cuando no comente! ja
                alert('Ha ocurrido un error');
            }

        });

        // //esto borra el text del input
        $(this).children().val("");

        }

      }); // end comments function


}); //end JQuery