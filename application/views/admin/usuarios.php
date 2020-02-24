<?php
require_once 'includes/header.php';

?>
  <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/js/admin/adminUsuarios.js"></script>

    <div class="div-inicio">
      <div class="div-btn">

        <a href="<?=base_url('admin/inicio')?>" class="link">Fotos</a>
        <a href="<?=base_url('admin/video')?>" class="link">Videos</a>
        <a href="<?=base_url('admin/nota')?>" class="link">Notas</a>
        <a href="<?=base_url('admin/comentarios')?>" class="link link-comentarios">
          Comentarios</a>
      
      </div>

      <div class="div-btn-and-tabla">

        <div class="div-btn-modal">

          <h2>Usuarios</h2>
          <button class="btn btn-success" id="user">Crear Usuario</button>
        
        </div>


        <div class="div-tabla">

          <!-- <div class="table-responsive"> -->
            <table id="usuarios" class="table table-striped table-bordered" width="100%" >
              <thead>
                <th width="5%">ID</th>
                <th width="20%">Nombre</th>
                <th width="20%">Ultimo Login</th>
                <th width="15%">Acción</th>
              </thead>
            </table>

          <!-- </div> -->

        </div>

      </div>

      <!-- modal fotos

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
              <input id="btn-photo" class="btn btn-success" type="button" value="Subir Foto"></input>
            </div>
          </form>
        </div>

         Modal para edicion-->

    </div>

  </body>
</html>
