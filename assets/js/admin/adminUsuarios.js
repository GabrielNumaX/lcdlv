$(document).ready(function() {

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const ajaxUsuarios = `${protocol}//${URLmaster}/Admin/ajax_listado`;

    function createDataTable() { //funcion para crear datatables
        table = $('#usuarios').DataTable({
            "ajax": {
                url : ajaxUsuarios,
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

    const usuariosBorrar = `${protocol}//${URLmaster}/Admin/borrar_user/`;

    function borrar_usuario(id){
        $.ajax({
          type:'POST',
          url: usuariosBorrar+id,
          success:function(){
            // alert('borrado');
            table.ajax.reload();
          },
          error:function(){
            alert('Ha ocurrido un error');
          },
        });
      }

    $('.div-tabla').on('click', '.btn.btn-sm.btn-danger', function() {

      const id = $(this).parent().siblings('.sorting_1').html();

      borrar_usuario(id);
    });

    const cargarUsuarios = `${protocol}//${URLmaster}/Admin/cargar_usuario`;

    function upUser(){
        var titulo = document.getElementById('titulo_nota').value;
        var nota = document.getElementById('nota').value;
        //NO SACAR ESTO!!!
        nota = nota.replace(/\r?\n/g, '<br/>');

        //NO sacar esto perric!!! LEER COMENTARIO DE ABAJO
        const modalNotes = document.getElementById('modalUser');

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
    $('#btn-user').on('click', upUser);
});
