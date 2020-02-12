<?php
require_once 'includes/header.php';

?>

    <div class="div-inicio">
      <div class="div-btn">

        <a href="<?=base_url('admin/video')?>" class="link">Videos</a>
        <a href="<?=base_url('admin/nota')?>" class="link">Notas</a>


      </div>

      <div class="div-btn-and-tabla">

        <div class="div-btn-modal">

          <h2>Fotos</h2>

          <button class="btn btn-success" id="photos">Subir Foto</button>

        </div>


        <div class="div-tabla">

          <!-- <div class="table-responsive"> -->
            <table id="fotos" class="table table-striped table-bordered" width="100%" >
              <thead>
                <th width="5%">ID</th>
                <th width="20%">Titulo</th>
                <th width="20%">Fecha</th>
                <th width="30%">Descripcion</th>
                <th width="10%">Foto</th>
                <th width="15%">Acción</th>
              </thead>
            </table>

          <!-- </div> -->

        </div>

      </div>
      <!-- modal fotos-->

        <div id="modalPhotos" class="modal">

          <form class="form modal-content" method="post">

            <div class="span-close">
              <span id="span-photos" class="close">&times;</span>
            </div>

            <div class="text-div">
              <label>Titulo Foto</label>
              <input class="titulo" type="text" id="titulo_foto" placeholder="Titulo..."></input>
              <label>Descripcion Foto</label>
              <textarea id="desc_foto"  placeholder="Descripcion..."></textarea>
            </div>
            <div class="btn-div">
              <input class="btn btn-success" type="file" id="file_upload_foto"></input>
              <input id="btn-photo" class="btn btn-success" type="button" onclick="upPhoto()" value="Subir Foto"></input>
              <input id="btn-photo_editar" class="btn btn-success" type="button" onclick="" value="Guardar cambios"></input>
            </div>
          </form>

        </div>

    </div>

  </body>

   <script>

   var table;
   //var save_method;
   jQuery(document).ready(function($){ //funcion para crear datatables
       table = $('#fotos').DataTable({
           "ajax": {
               url : '<?= base_url('Fotos/ajax_listado')?>',
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

    function upPhoto(){
      var titulo = document.getElementById('titulo_foto').value;
      var desc = document.getElementById('desc_foto').value;

      const modalPhotos = document.getElementById("modalPhotos");

      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload_foto');
      var photo = inputFileImage.files[0];
      var data = new FormData();
      data.append('file_upload_foto', photo);
      data.append('titulo', titulo);
      data.append('descripcion', desc);

      $.ajax({
        type:'POST',
        url:'<?=base_url('Fotos/cargar_fotos')?>',
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          document.getElementById('titulo_foto').value = "";
          document.getElementById('desc_foto').value = "";
          document.getElementById('file_upload_foto').value = "";

          modalPhotos.style.display= "none";
          //recarga la tabla cada vez que se sube una foto para que aparezca la nueva info
          table.ajax.reload();

          //esto es un canceric jajaja
          // $('span-photos').click();

        },

      });
    }
    /*Funcion para borrar fotos de la BDD*/
    function borrar_foto(id){
      $.ajax({
        type:'POST',
        url: '<?=base_url('Fotos/borrar_foto/')?>'+id,
        success:function(){
          /*no se si poner una alerta o no, queda medio cancer si pongo una!*/
          table.ajax.reload();
        },
        error:function(){
          /*y esto tambien queda medio cancer.. perohay que poner algo para el error,
          de ultima se puede hacer que aparezca un div en rojo con la info del error;*/
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Algo salio mal',
          });
        },
      });
    }
    function editar_foto(id){
      $.ajax({
        type:'GET',
        url:'<?=base_url('Fotos/editar_foto/')?>'+id,
        dataType:'JSON',
        success:function(data){
          document.getElementById('titulo_foto').value = data.titulo;
          document.getElementById('desc_foto').value = data.descripcion;
          document.getElementById('file_upload_foto').disabled = true;
          //solo cambia los botones del modal, mas facil!
          document.getElementById('btn-photo').style.display = "none";
          document.getElementById('btn-photo_editar').style.display = "block";
          modalPhotos.style.display = "block";
        },
        error:function(){
          //esto hay que sacarlo o hacer algo para el error no se!
          alert('Error');
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
