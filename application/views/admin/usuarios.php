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
                <th width="20%">Apellido</th>
                <th width="20%">Email</th>
                <th width="20%">Ultimo Login</th>
                <th width="15%">Acción</th>
              </thead>
            </table>

          <!-- </div> -->

        </div>

      </div>

        <div id="modalUser" class="modal">

          <form class="form modal-content" method="post">

            <div class="span-close">
              <span id="span-user" class="close">&times;</span>
            </div>

            <div class="text-div">
              <label for="nombre">Nombre</label>
              <input required name="nombre" type="text" id="name" placeholder="Ingrese un nombre"></input>
              <label for="apellido">Apellido</label>
              <input required name="apellido" type="text" id="surname"  placeholder="Ingrese un apellido"></input>
              <label for="email">Email</label>
              <input name="email" type="email" id="email"  placeholder="Ingrese un email"></input>
              <label for="pass1">Constraseña</label>
              <input name="pass1" type="password" id="pass1"  placeholder="Ingrese su contraseña"></input>
              <label for="pass2">Confirmar contraseña</label>
              <input name="pass2" type="password" id="pass2"  placeholder="Repita su contraseña"></input>
            </div>
            <div class="btn-div">
              <input id="btn-user" class="btn btn-success" type="button" value="Guardar usuario"></input>
            </div>
          </form>
        </div>

    </div>

  </body>
</html>
