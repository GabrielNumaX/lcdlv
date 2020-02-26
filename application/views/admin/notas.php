<?php
require_once 'includes/header.php';
?>

<script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
  <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/js/admin/adminNotas.js"></script>

    <div class="div-inicio">
      <div class="div-btn">

        <a href="<?=base_url('admin/inicio')?>" class="link">Fotos</a>
        <a href="<?=base_url('admin/video')?>" class="link">Videos</a>
        <a href="<?=base_url('admin/comentarios')?>" class="link link-comentarios">Comentarios</a>
        <a href="<?=base_url('admin/usuarios')?>" class="link">Usuarios</a>

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
              <textarea id="nota" placeholder="Texto nota..."></textarea>
            </div>
            <div class="btn-div">
              <input id="btn-note" class="btn btn-success" type="button" value="Subir Nota"></input>
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
              <button id="btn-note_editar" class="btn btn-success" type="button">Guardar cambios</button>
            </div>
          </form>
        </div>

    </div>

  </body>
</html>
