<?php
require_once 'includes/header.php';
?>
    <div class="div-inicio">
      <div class="div-btn">

        <a href="<?=base_url('admin/inicio')?>" class="link">Fotos</a>
        <a href="<?=base_url('admin/nota')?>" class="link">Notas</a>

      </div>

      <div class="div-btn-and-tabla">

        <div class="div-btn-modal">

          <h2>Videos</h2>

          <button class="btn btn-success" id="videos">Subir Videos</button>

        </div>


        <div class="div-tabla">

          <!-- <div class="table-responsive"> -->
            <table id="videos_tabla" class="table table-striped table-bordered" width="100%" >
              <thead>
                <th width="5%">ID</th>
                <th width="20%">Titulo</th>
                <th width="20%">Fecha</th>
                <th width="25%">Descripcion</th>
                <th width="15%">Video</th>
                <th width="15%">Acción</th>
              </thead>
            </table>

          <!-- </div> -->

        </div>

      </div>
        <!-- modal videos -->

        <div id="modalVideos" class="modal">

          <form class="form modal-content" method="post" enctype="multipart/form-data">

            <div class="span-close">
              <span id="span-videos" class="close">&times;</span>
            </div>

            <div class="text-div">
              <label>Titulo Video</label>
              <input class="titulo" type="text" id="titulo_video" placeholder="Titulo..."></input>
              <label>Descripcion Video</label>
              <textarea id="desc_video" placeholder="Descripcion..."></textarea>
            </div>
            <div class="btn-div">
              <input class="btn btn-success" type="file" id="file_upload_video"></input>
              <input id="btn-video" class="btn btn-success" type="button" onclick="upVideo()" value="Subir Video"></input>
              <input id="btn-video_editar" class="btn btn-success" type="button" onclick="" value="Guardar cambios"
                      style="display: none"></input>
            </div>
          </form>
        </div>

        <!-- Modal para edicion-->
        <div id="modalVideosEdit" class="modal">
          <form class="form modal-content" method="post">
            <div class="span-close">
              <span id="span-videos_edit" class="close">&times;</span>
            </div>

            <div class="text-div">
              <label>Editar Titulo</label>
              <input class="titulo" type="text" id="titulo-video_edit" placeholder="Titulo...">
              <label>Editar Descripcion</label>
              <textarea id="video_edit" placeholder="Descripcion..."></textarea>
            </div>
            <div class="btn-div">
              <input id="btn-video_editar" class="btn btn-success" type="button" onclick="guardar_cambios()" value="Guardar cambios"></input>
            </div>
          </form>
        </div>

    </div>

  </body>

   <script>

   var table;
   //var save_method;
   jQuery(document).ready(function($){ //funcion para crear datatables
       table = $('#videos_tabla').DataTable({
           "ajax": {
               url : '<?= base_url('Videos/ajax_listado')?>',
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
    function upVideo(){
      var titulo = document.getElementById('titulo_video').value;
      var desc = document.getElementById('desc_video').value;

      const modalVideos = document.getElementById("modalVideos");

      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload_video');
      var video = inputFileImage.files[0];
      var data = new FormData();

      data.append('file_upload_video', video);
      data.append('titulo', titulo);
      data.append('descripcion', desc);

      $.ajax({
        type:'POST',
        url:'<?=base_url('Videos/cargar_videos/')?>',
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          document.getElementById('titulo_video').value = "";
          document.getElementById('desc_video').value = "";
          document.getElementById('file_upload_video').value = "";

          // alert(data);

          modalVideos.style.display = "none";

          table.ajax.reload();
        },

      });
    }
    function borrar_video(id){
      $.ajax({
        type:'POST',
        url: '<?=base_url('Videos/borrar_video/')?>'+id,
        success:function(){
          alert('dato borrado');
          table.ajax.reload();
        },
        error:function(){
          alert('a la verga wey');
        },
      });
    }
    function editar_video(id){
      $.ajax({
        type:'GET',
        url:'<?=base_url('Videos/editar_video/')?>'+id,
        dataType:'JSON',
        success:function(data){
          // /*asi hay que hacer en todos los modal, vamos a necesitar uno para subir y otro para editar
          // serian 2 modal por pagina*/
          // document.getElementById('titulo_video').value = data.titulo;
          // document.getElementById('desc_video').value = data.descripcion;
          // document.getElementById('file_upload_video').disabled = true;
          // document.getElementById('btn-video').style.display = "none";
          // document.getElementById('btn-video_editar').style.display = "block";
          // modalVideos.style.display = "block";

          const modalVideos = document.getElementById('modalVideosEdit');

          modalVideos.dataset.id = data.id;

          modalVideos.style.display = "block";

          alert(modalVideos.dataset.id);

          document.getElementById('titulo-video_edit').value = data.titulo;
          document.getElementById('video_edit').value = data.descripcion;

          // Get the <span> element that closes the modal
          const spanVideos = document.getElementById("span-videos_edit");

          // When the user clicks on <span> (x), close the modal
          spanVideos.onclick = function() {
            modalVideos.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modalVideos) {
              modalVideos.style.display = "none";
            }
          }

        },
        error:function(){
          alert('no vuelve nada');
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
