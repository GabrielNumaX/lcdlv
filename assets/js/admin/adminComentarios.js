$(document).ready(function() {

    // console.log('admin jquery');

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const comentariosAjax = `${protocol}//${URLmaster}/Comentarios/ajax_listado`;

    //funcion para crear datatables
    function createDataTable(){ 
        table = $('#comentarios_tabla').DataTable({
            "ajax": {
                url : comentariosAjax,
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

    const comentariosBorrar = `${protocol}//${URLmaster}/Comentarios/borrar_coment/`;

    function borrar_comment(id){
        $.ajax({
          type:'POST',
          url: comentariosBorrar+id,
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

      borrar_comment(id);
    });

      const logoutUrl = `${protocol}//${URLmaster}/Admin/logout`;

      const adminUrl = `${protocol}//${URLmaster}/Admin`;

      function logout(){
        $.ajax({
          type:'POST',
          url: logoutUrl,
          success:function(){
            // location.href = "<?=base_url('admin')?>";
            location.href = adminUrl;
          },
          error:function(){
            Swal.fire('no anduvo nada');
          }
        });
      }

      $('#btn-logout').on('click', logout)

    

}); //end jquery

