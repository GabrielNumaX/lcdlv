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

    const usuariosBorrar = `${protocol}//${URLmaster}/Admin/borrar_usuario/`;

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
      //console.log('borrar');
      borrar_usuario(id);
    });

    const cargarUsuarios = `${protocol}//${URLmaster}/Admin/crear_usuario`;

    function upUser(){
        var nombre = document.getElementById('name').value;
        var apellido = document.getElementById('surname').value;
        var email = document.getElementById('email').value;
        var pass1 = document.getElementById('pass1').value;
        var pass2 = document.getElementById('pass2').value;

        //NO sacar esto perric!!! LEER COMENTARIO DE ABAJO
        const modalUser = document.getElementById('modalUser');
        if((pass1 === pass2) && (pass1 !== "" && pass2 !== "")){
          var data = new FormData();
          data.append('nombre', nombre);
          data.append('apellido', apellido);
          data.append('email', email);
          data.append('pass1', pass1);
          $.ajax({
              type: 'POST',
              url: cargarUsuarios,
              data: data,
              contentType: false,
              processData: false,
              cache: false,
              success: function(data){
                datalert = JSON.parse(data);
                alert(datalert.mensaje);
                  //mostrar cargando
                  document.getElementById('name').value = "";
                  document.getElementById('surname').value = "";
                  document.getElementById('email').value = "";
                  document.getElementById('pass1').value = "";
                  document.getElementById('pass2').value = "";

                  //NO sacar esto perric es para q cierre el modal despues de cargar
                  modalUser.style.display = 'none';
                  // alert('Nota Cargada');
                  table.ajax.reload();
              },
              error: function(){
                  alert('Error 502');
              },
          });
        }else{
          alert('las pass no son iwales');
        }
      }

    $('#btn-user').on('click', upUser);
});
