<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lcdlv - CMS Login</title>
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/adminhome.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
    <script src="<?=base_url()?>assets/js/admin/adminHome.js"></script>
  </head>
  <body>
    <div class="container">

      <h1 class="admin-h1">Admin de la Vergha</h1>

      <div class="form-group form-div">
        <form class="form" method="post">

          <div class="form-label">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" required placeholder="Nombre de usuario" id="user">
          </div>

          <div class="form-label">
            <label for="password">Contraseña</label>
            <input type="password" name="password" value="" required placeholder="Contraseña" id="pass">
          </div>

          <!-- aca va el mensaje cancer de error-->
          <div id="mensaje" style="display:none">
          </div>

          <div class="btn-div">
            <button id="btn-login" class="btn btn-success" type="button">Ingresar</button>
          </div>
        </form>

      </div>
      <!--esto tiene que aparecer abajo del form-->
    </div>
  </body>
  <script>

  // const passField = document.getElementById('pass');

  // passField.addEventListener('keyup', function(e){

  //   e.preventDefault();

  //   if(e.keyCode === 13){

  //     login();

  //   }

  // })

  function login(){
    user = document.getElementById('user').value;
    pass = document.getElementById('pass').value;
    $.ajax({
      type:'POST',
      url:'<?= base_url('admin/login')?>',
      data:{
        pass:pass,
        user:user
      },
      success:function(r){
        response = JSON.parse(r);
        if(response.estado == true){
            location.href = "<?=base_url('admin/inicio')?>";
        }else{
          const mensaje = document.getElementById('mensaje');
          mensaje.innerHTML = '<p style="color:red; padding: 0; margin: 0;">'+response.mensaje+'</p>';
          mensaje.style.display = "flex";
        }


      },
      error:function(){
        Swal.fire('Ocurrio un error con el servidor!');
      }
  });
}
  </script>
</html>
