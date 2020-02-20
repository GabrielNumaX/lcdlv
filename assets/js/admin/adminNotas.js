$(document).ready(function() {


    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const ajaxNotas = `${protocol}//${URLmaster}/Notas/ajax_listado`;


    function createDataTable() { //funcion para crear datatables
        table = $('#notas').DataTable({
            "ajax": {
                url : ajaxNotas,
                type : 'GET'
            },
            language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    }

    createDataTable();

    const cargarNotas = `${protocol}//${URLmaster}/Notas/cargar_notas`;

    function upNote(){
        var titulo = document.getElementById('titulo_nota').value;
        var nota = document.getElementById('nota').value;
        //NO SACAR ESTO!!!
        nota = nota.replace(/\r?\n/g, '<br/>');

        //NO sacar esto perric!!! LEER COMENTARIO DE ABAJO
        const modalNotes = document.getElementById('modalNotes');

        var data = new FormData();
        data.append('titulo', titulo);
        data.append('nota', nota);

        $.ajax({
            type: 'POST',
            url: cargarNotas,
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            success: function(){
                //mostrar cargando
                document.getElementById('titulo_nota').value = "";
                document.getElementById('nota').value = "";

                //NO sacar esto perric es para q cierre el modal despues de cargar
                modalNotes.style.display = 'none';
                // alert('Nota Cargada');
                table.ajax.reload();
            },
            error: function(){
                alert('Error 502');
            },
        });
    }

    $('#btn-note').on('click', upNote);

    const borrarNotas = `${protocol}//${URLmaster}/Notas/borrar_nota/`;

    function borrar_nota(id){
        $.ajax({
            type:'POST',
            url: borrarNotas + id,
            success:function(){
                // alert('Nota borrada');
                table.ajax.reload();
            },
            error:function(){
                alert('Error al borrar nota');
            },
        });
    }

    $('.div-tabla').on('click', '.btn.btn-sm.btn-danger', function() {

        const id = $(this).parent().siblings('.sorting_1').html();

        borrar_nota(id);
    });


    const editarNotas = `${protocol}//${URLmaster}/Notas/editar_nota/`;
    
    function editar_nota(id){

        $.ajax({
            type:'GET',
            url: editarNotas + id,
            dataType:'JSON',
            success:function(data){

            const modalNotes = document.getElementById('modalNotesEdit');

            modalNotes.dataset.id = data.id;
            document.getElementById('titulo-nota_edit').value = data.titulo;
            document.getElementById('nota_edit').value = data.nota;
            modalNotes.style.display = "block";

            // Get the <span> element that closes the modal
            const spanNotes = document.getElementById("span-notes_edit");

            // When the user clicks on <span> (x), close the modal
            spanNotes.onclick = function() {
                modalNotes.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modalNotes) {
                modalNotes.style.display = "none";
                }
            }
            },
            error:function(){
            alert('Error');
            },
        });
    }

    $('.div-tabla').on('click', '.btn.btn-sm.btn-info', function() {

        const id = $(this).parent().siblings('.sorting_1').html();

        editar_nota(id);
    });

    const updateNotas = `${protocol}//${URLmaster}/Notas/update_nota/`;

    function guardar(){
        const titulo = document.getElementById('titulo-nota_edit').value;
        let nota = document.getElementById('nota_edit').value;

        //NO SACAR ESTO!!!
        nota = nota.replace(/\r?\n/g, '<br/>');
        
        const modal = document.getElementById('modalNotesEdit');
        const id = modal.dataset.id;
        $.ajax({
            type:'POST',
            url: updateNotas + id,
            data:{
            titulo:titulo,
            nota:nota
            },
            success:function(){

                modal.style.display = 'none';

                table.ajax.reload();
            },
            error:function(){
                alert('Error al guardar nota')
            }
        });
    }

    $('#btn-note_editar').on('click', guardar)

    const logoutUrl = `${protocol}//${URLmaster}/Admin/logout`;

    const adminUrl = `${protocol}//${URLmaster}/admin`;

    function logout(){
        $.ajax({
            type:'POST',
            url: logoutUrl,
            success:function(){
            location.href = adminUrl;
            },
            error:function(){
            Swal.fire('Error');
            }
        });
    }

    $('#btn-logout').on('click', logout);

}); //end jquery