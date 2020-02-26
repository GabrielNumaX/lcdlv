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
          <button class="btn btn-success" id="user">Crear Usuario</button>
          <button class="btn btn-sm btn-info" onclick='editar(<?=$id?>)'><i class="fas fa-user-edit"></i> Editar <?=$nombre?></button>
        </div>


        <div class="div-tabla">

          <!-- <div class="table-responsive"> -->
            <table id="usuarios" class="table table-striped table-bordered" width="100%" >
              <thead>
                <th width="5%">ID</th>
                <th width="20%">Nombre</th>
                <th width="20%">Apellido</th>
                <th width="20%">Email</th>
                <th width="20%">Tipo</th>
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
              <label for="rol">Tipo de usuario</label>
              <select id="type" class="form-control form-control-sm" name="rol">
                <option style="color:red;" value="1">Administrador</option>
                <option style="color:blue;" value="2">Usuario</option>
              </select>
            </div>
            <div class="btn-div">
              <input id="btn-user" class="btn btn-success" type="button" value="Guardar usuario"></input>
            </div>
          </form>
        </div>

        <div id="modalUser_edit" class="modal">

          <form class="form modal-content" method="post">

            <div class="span-close">
              <span id="span-user_edit" class="close">&times;</span>
            </div>

            <div class="text-div">
              <label for="nombre">Nombre</label>
              <input required name="nombre" type="text" id="name_edit" placeholder="Ingrese un nombre"></input>
              <label for="apellido">Apellido</label>
              <input required name="apellido" type="text" id="surname_edit"  placeholder="Ingrese un apellido"></input>
              <label for="email">Email</label>
              <input name="email" type="email" id="email_edit"  placeholder="Ingrese un email"></input>
              <label for="pass1">Constraseña</label>
              <input name="pass1" type="password" id="pass1_edit"  placeholder="******"></input>
              <label for="pass2">Confirmar contraseña</label>
              <input name="pass2" type="password" id="pass2_edit"  placeholder="******"></input>
              <label for="rol">Tipo de usuario</label>
              <select id="type_edit" class="form-control form-control-sm" name="rol">
                <option value="1">Administrador</option>
                <option value="2">Usuario</option>
              </select>
            </div>
            <div class="btn-div">
              <input id="btn-user_edit" class="btn btn-success" type="button" value="Actualizar usuario"></input>
            </div>
          </form>
        </div>

    </div>

  </body>
</html>
<script>
function editar(id){
  $.ajax({
    type:'POST',
    url: '<?=base_url('Admin/update_user/')?>'+id,
    dataType:'JSON',
    success:function(data){
      const modalUser = document.getElementById('modalUser_edit');
      modalUser.dataset.id = data.id;
      document.getElementById('name_edit').value = data.nombre;
      document.getElementById('surname_edit').value = data.apellido;
      document.getElementById('email_edit').value = data.email;
      document.getElementById('pass1_edit').value = "";
      document.getElementById('pass2_edit').value = "";
      document.getElementById('type_edit').value = data.tipo;
      modalUser.style.display = "block";
      const spanUser = document.getElementById("span-user_edit");

      // When the user clicks on <span> (x), close the modal
      spanUser.onclick = function() {
          modalUser.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modalUser) {
          modalUser.style.display = "none";
          }
      }
    },


  });
}

function guardar(){

    const modalUser = document.getElementById('modalUser_edit');
    var id = modalUser.dataset.id;
    var name = document.getElementById('name_edit').value;
    var surname = document.getElementById('surname_edit').value;
    var email = document.getElementById('email_edit').value;
    var rol = document.getElementById('type_edit').value;
    var pass1 = document.getElementById('pass1_edit').value;
    var pass2 = document.getElementById('pass2_edit').value;
    $.ajax({
        type:'POST',
        url: '<?=base_url('Admin/save_user')?>',
        data:{
          id:id,
          name:name,
          surname:surname,
          email:email,
          rol:rol,
          pass1:pass1,
          pass2:pass2
        },
        success:function(){

            modalUser.style.display = 'none';

            table.ajax.reload();
        },
        error:function(){
            alert('Error al actualizar usuario');
        }
    });
}

$('#btn-user_edit').on('click', guardar)

</script>
