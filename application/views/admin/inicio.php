<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      if($this->session->has_userdata('log')){
        $this->session;
        $nombre = $this->session->userdata('nombre');
      }else{
        $this->session->sess_destroy();
      }
     ?>
     <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

     <link rel="stylesheet" href="<?=base_url()?>assets/css/admininicio.css">
     <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
     <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>

      <!-- ver los comentarios de este archivo -->
     <script src="<?=base_url()?>assets/js/adminInicioModal.js"></script>

     <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <meta charset="utf-8">
    <title><?php echo 'Bienvenido '.$nombre ?></title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="<?=base_url('assets/favicon/favicon-32x32.png')?>" width="30" height="30" class="d-inline-block align-top" alt="">
        LCDLV
      </a>
      <button class="btn btn-danger" type="button" onclick="logout()"><i class="fas fa-sign-out-alt"></i></button>
    </nav>
    <div class="div-inicio">
      <div class="div-btn">

        <a class="link">Fotos</a>
        <a class="a" >Videos</a>
        <a class="link" >Nota</>
      </div>

      <div class="div-btn-modal">

        <button class="btn btn-success" id="fotos">Subir Fotos</button>
        <button class="btn btn-success" id="videos">Subir Videos</button>
        <button class="btn btn-success" id="notas">Subir Notas</button>
      </div>


      <div class="div-tabla">

        <div class="table-responsive">
          <table id="fotos" class="table table-striped table-bordered" width="100%">
            <thead>
              <th>ID</th>
              <th>Titulo</th>
              <th>Fecha</th>
              <th>Descripcion</th>
              <th>Foto</th>
              <th>Acción</th>
            </thead>
          </table>
        </div>

      </div>
      <!-- modales de los form -->

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
            <input id="btn-photo" class="btn btn-success"
                  type="button"
                  onclick="upPhoto()"
                  value="Subir Foto"></input>
          </div>
        </form>

      </div>

      <!-- modal videos -->

      <div id="modalVideos" class="modal">

        <form class="form modal-content" method="post">

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
            <input class="btn btn-success" type="button" onclick="upVideo()" value="Subir Video"></input>
          </div>
        </form>

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
       table = $('#fotos').DataTable({
           "ajax": {
               url : '<?= base_url('Admin/ajax_listado_fotos')?>',
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

      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload_foto');
      var photo = inputFileImage.files[0];
      var data = new FormData();
      data.append('file_upload_foto', photo);
      data.append('titulo', titulo);
      data.append('descripcion', desc);

      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/cargar_fotos')?>',
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          document.getElementById('titulo_foto').value = "";
          document.getElementById('desc_foto').value = "";
          document.getElementById('file_upload_foto').value = "";
          alert(data);
          $(".upload-msg").html(data);
					window.setTimeout(function() {
					       $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
					       $(this).remove();
					       });	}, 5000);
        },

      });
    }
    function upVideo(){
      var titulo = document.getElementById('titulo_video').value;
      var desc = document.getElementById('desc_video').value;
      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload_video');
      var video = inputFileImage.files[0];
      var data = new FormData();

      data.append('file_upload_video', video);
      data.append('titulo', titulo);
      data.append('descripcion', desc);


      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/cargar_videos/')?>',
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          document.getElementById('titulo_video').value = "";
          document.getElementById('desc_video').value = "";
          document.getElementById('file_upload_video').value = "";
          alert(data);
          $(".upload-msg").html(data);
					window.setTimeout(function() {
					       $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
					       $(this).remove();
					       });	}, 5000);
        },

      });
    }
    function upNote(){
      var titulo = document.getElementById('titulo_nota').value;
      var nota = document.getElementById('nota').value;
      var data = new FormData();
      data.append('titulo', titulo);
      data.append('nota', nota);
      $.ajax({
        type: 'POST',
        url: '<?=base_url('Admin/cargar_notas/')?>',
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(){
          //mostrar cargando
          document.getElementById('titulo_nota').value = "";
          document.getElementById('nota').value = "";
          alert('Nota Cargada');
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
