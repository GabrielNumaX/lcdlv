<?php
require_once 'includes/header.php';
?>

    <div class="div-inicio">
      <div class="div-btn">

        <a href="<?=base_url('admin/inicio')?>" class="link">Fotos</a>
        <a href="<?=base_url('admin/video')?>" class="link">Videos</a>

      </div>

      <div class="div-btn-and-tabla">

        <div class="div-btn-modal">

          <button class="btn btn-success" id="notes">Subir Notas</button>

        </div>


        <div class="div-tabla">

          <!-- <div class="table-responsive"> -->
            <table id="notas" class="table table-striped table-bordered" width="100%" >
              <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Nota</th>
                <th>Acción</th>
              </thead>
            </table>

          <!-- </div> -->

        </div>

      </div>
        <!-- modal notas -->

        <div id="modalNotes" class="modal">

          <form class="form modal-content" method="post">

            <div class="span-close">
              <span id="span-notes" class="close">&times;</span>
            </div>

            <div class="text-div">
              <label>Titulo Nota</label>
              <input class="titulo" type="text" id="titulo_nota" placeholder="Titulo..."></input>
              <label>Nota</label>
              <textarea id="nota" placeholder="Nota"></textarea>
            </div>
            <div class="btn-div">
              <input class="btn btn-success" type="button" onclick="upNote()" value="Subir Nota"></input>
            </div>
          </form>

        </div>

    </div>

  </body>

   <script>

   var table;
   //var save_method;
   jQuery(document).ready(function($){ //funcion para crear datatables
       table = $('#notas').DataTable({
           "ajax": {
               url : '<?= base_url('Notas/ajax_listado')?>',
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
   });
    function upNote(){
      var titulo = document.getElementById('titulo_nota').value;
      var nota = document.getElementById('nota').value;
      var data = new FormData();
      data.append('titulo', titulo);
      data.append('nota', nota);
      $.ajax({
        type: 'POST',
        url: '<?=base_url('Notas/cargar_notas/')?>',
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(){
          //mostrar cargando
          document.getElementById('titulo_nota').value = "";
          document.getElementById('nota').value = "";
          alert('Nota Cargada');
          table.ajax.reload();
        },
        error: function(){
          alert('Error 502');
        },
      });
    }
    function logout(){
      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/logout')?>',
        success:function(){
          location.href = "<?=base_url('admin')?>";
        },
        error:function(){
          Swal.fire('no anduvo nada');
        }
      });
    }
  </script>
</html>
