<?php
require_once 'includes/header.php';
$id = isset($_SESSION['id']) ? ($_SESSION['id']) : "";
$nombre = isset($_SESSION['nombre']) ? ($_SESSION['nombre']) : "";
$token = md5(uniqid(mt_rand(), true));
$_SESSION['token'] = $token;
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
          <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1):?>
            <button class="btn btn-success" id="user">Crear Usuario</button>
          <?php else: ?>
            <button class="btn btn-success" id="user" disabled title="Debe ser Administrador para Crear Usuario">
              Crear Usuario</button>
          <?php endif; ?>
          
          <button id="btn-edit-user"class="btn btn-sm btn-info" data-id="<?=$id?>">
            <i class="fas fa-user-edit"></i> Editar <?=$nombre?>
          </button>
        </div>


        <div class="div-tabla">

          <!-- <div class="table-responsive"> -->
            <table id="usuarios" class="table table-striped table-bordered" width="100%" >
              <thead>
                <th width="5%">ID</th>
                <th width="15%">Nombre</th>
                <th width="15%">Apellido</th>
                <th width="15%">Email</th>
                <th width="15%">Tipo</th>
                <th width="25%">Ultimo Login</th>
                <th width="10%">Acción</th>
              </thead>
            </table>

          <!-- </div> -->

        </div>

      </div>

        <div id="modalUser" class="modal">

          <form class="user-form modal-content" method="post">

            <div class="span-close">
              <span id="span-user" class="close">&times;</span>
            </div>

            <h3>Crear Usuario</h3>

            <div class="user-div">
              <div class="user-data-div">

                <label for="nombre">Nombre</label>
                <input required name="nombre" type="text" id="name" placeholder="Ingrese un nombre"></input>
                <label for="apellido">Apellido</label>
                <input  name="apellido" type="text" id="surname"  placeholder="Ingrese un apellido"></input>
                <label for="email">Email</label>
                <input required name="email" type="email" id="email"  placeholder="Ingrese un email"></input>
                <label for="pass1">Contraseña</label>
                <input name="pass1" type="password" id="pass1"  placeholder="Ingrese su contraseña"></input>
                <label for="pass2">Confirmar contraseña</label>
                <input name="pass2" type="password" id="pass2"  placeholder="Repita su contraseña"></input>
                <p id="pass-verify">Las contraseñas no coinciden</p>
                <label for="rol">Tipo de usuario</label>

                <select id="type" class="form-control form-control-sm" name="rol">
                  <option style="color:red;" value="1">Administrador</option>
                  <option style="color:blue;" value="2">Usuario</option>
                </select>

              </div>

              <div class="btn-user-div">
                <input id="btn-user" class="btn btn-success" type="button" value="Guardar usuario"></input>
              </div>
            </div>
            
          </form>
        </div>

        <div id="modalUser_edit" class="modal">

          <form class="user-form modal-content" method="post">

            <div class="span-close">
              <span id="span-user_edit" class="close">&times;</span>
            </div>

            <h3>Editar Usuario</h3>

            <div class="user-div">
              <div class="user-data-div">

                <label for="nombre">Nombre</label>
                <input required name="nombre" type="text" id="name_edit" placeholder="Ingrese un nombre"></input>
                <label for="apellido">Apellido</label>
                <input name="apellido" type="text" id="surname_edit"  placeholder="Ingrese un apellido"></input>
                <label for="email">Email</label>
                <input required name="email" type="email" id="email_edit" placeholder="Ingrese un email"></input>
                <label for="pass1">Contraseña</label>
                <input name="pass1" type="password" id="pass1_edit"></input>
                <label for="pass2">Confirmar contraseña</label>
                <input name="pass2" type="password" id="pass2_edit"></input>

                <p id="pass-verify_edit">Las contraseñas no coinciden</p>
                
                <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1):?>
                  <label for="rol">Tipo de usuario</label>
                  <select id="type_edit" class="form-control form-control-sm" name="rol">
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>
                <?php else: ?>
                  <label for="rol">Tipo de usuario</label>
                  <select id="type_edit" class="form-control form-control-sm" name="rol">
                    <option value="2">Usuario</option>
                  </select>
                <?php endif; ?>
              </div>
              <div class="btn-user-div">
                <input id="btn-user_edit" class="btn btn-success" type="button" value="Actualizar usuario"></input>
                <input id="btn-user_delete" class="btn btn-danger" type="button" value="Borrar usuario"></input>
              </div>
            </div>
          </form>
        </div>

    </div>

  </body>
</html>
