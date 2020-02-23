<?php
require_once 'includes/header.php';
?>

<script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/js/admin/adminVideos.js"></script>


    <div class="div-inicio">
      <div class="div-btn">

        <a href="<?=base_url('admin/inicio')?>" class="link">Fotos</a>
        <a href="<?=base_url('admin/nota')?>" class="link">Notas</a>
        <a href="<?=base_url('admin/comentarios')?>" class="link-comentario">Comentarios</a>
        <a href="<?=base_url('admin/usuarios')?>" class="link-comentario">Usuarios</a>

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
              <input id="btn-video" class="btn btn-success" type="button" value="Subir Video"></input>
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
              <button id="btn-video_editar" class="btn btn-success" type="button">Guardar cambios</button>
            </div>
          </form>
        </div>

    </div>

  </body>
</html>
