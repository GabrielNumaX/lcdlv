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
        // else {
        //     console.log('inside else');
        // }

        //fin comments

        $(article).append(divNota, formComments, tableComments);

        $(main).append(article);

        // console.log('note added');


    }

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

        //aca habria que hacer un for con el json y
        //filtrar por foto video o nota y usar las functions
        
        for(let i = 0; i < dataParse.length; i++){

            // console.log(i);

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
                
                $(this).children().val("");
                // alert('successfull comment')
                location.reload(true);
            },
            error: function() {
              //igual es al pedo el error se va a dar cuenta cuando no comente! ja
                alert('Ha ocurrido un error');
            }

        });

        // //esto borra el text del input
        // $(this).children().val("");

        }

      }); // end comments function


}); //end JQuery