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

          <h2>Notas</h2>

          <button class="btn btn-success" id="notes">Subir Notas</button>

        </div>


        <div class="div-tabla">

          <!-- <div class="table-responsive"> -->
            <table id="notas" class="table table-striped table-bordered" width="100%" >
              <thead>
                <th width="5%">ID</th>
                <th width="20%">Titulo</th>
                <th width="20%">Fecha</th>
                <th width="40%">Nota</th>
                <th width="15%">Acción</th>
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
              <input id="btn-note" class="btn btn-success" type="button" onclick="upNote()" value="Subir Nota"></input>
            </div>
          </form>

        </div>

        <!-- Modal para edicion-->
        <div id="modalNotesEdit" class="modal">
          <form class="form modal-content" method="post">
            <div class="span-close">
              <span id="span-notes_edit" class="close">&times;</span>
            </div>

            <div class="text-div">
              <label>Editar Titulo</label>
              <input class="titulo" type="text" id="titulo-nota_edit" placeholder="Titulo...">
              <label>Editar Nota</label>
              <textarea id="nota_edit" placeholder="Nota"></textarea>
            </div>
            <div class="btn-div">
              <button id="btn-note_editar" class="btn btn-success" type="button" onclick="guardar()">Guardar cambios</button>
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
      //NO SACAR ESTO!!!
      nota = nota.replace(/\r?\n/g, '<br/>');

      //NO sacar esto perric!!! LEER COMENTARIO DE ABAJO
      const modalNote = document.getElementById('modalNotes');

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

          //NO sacar esto perric es para q cierre el modal despues de cargar
          modalNotes.style.display = 'none';
          alert('Nota Cargada');
          table.ajax.reload();
        },
        error: function(){
          alert('Error 502');
        },
      });
    }
    function borrar_nota(id){
      $.ajax({
        type:'POST',
        url:'<?=base_url('Notas/borrar_nota/')?>'+id,
        success:function(){
          alert('Nota borrada');
          table.ajax.reload();
        },
        error:function(){
          alert('Error');
        },
      });
    }
    function editar_nota(id){

      $.ajax({
        type:'GET',
        url:'<?=base_url('Notas/editar_nota/')?>'+id,
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
    function guardar(){
      var titulo = document.getElementById('titulo-nota_edit').value;
      var nota = document.getElementById('nota_edit').value;
      const modal = document.getElementById('modalNotesEdit');
      var id = modal.dataset.id;
      $.ajax({
        type:'POST',
        url:'<?=base_url('Notas/update_nota/')?>'+id,
        data:{
          titulo:titulo,
          nota:nota
        },
        success:function(){
          table.ajax.reload();
        },
        error:function(){

        }
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
          Swal.fire('Error');
        }
      });
    }
  </script>
</html>
