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

        const divNota = document.createElement('div');

        $(divNota).attr('class', 'nota')

        $(divNota).attr('id', 'nota'+obj.id);

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

        $(main).append(article);

        // console.log('note added');


    }

    function asideNotes(obj) {

        const ul = $('.ul-notas');

        const li = document.createElement('li')

        $(li).attr('class', 'li-notas');

        const a = document.createElement('a');

        // $(a).attr('class', 'li-notas-a');

        $(a).prop('href', '#nota'+obj.id);

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


}); //end JQuery