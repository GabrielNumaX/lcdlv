<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lcdlv - CMS Login</title>
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="form-group">
        <form class="" method="post">
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" required placeholder="Nombre de usuario" id="user">
          <br>
          <label for="password">Contraseña</label>
          <input type="password" name="password" value="" required placeholder="Contraseña" id="pass">
          <br>
          <button class="btn btn-success" type="button" name="button" onclick="login()">Ingresar</button>
        </form>
      </div>
    </div>
  </body>
  <script>
  function login(){
    var usuario = document.getElementById('user').value;
    var password = document.getElementById('pass').value;
    $.ajax({
      type:'POST',
      url:'<?= base_url('Admin/login')?>',
      data:{
        usuario:usuario,
        password:password
      },
      success:function(r){
        respuesta = JSON.parse(r);
        if(respuesta['estado'] == true){
          //Swal.showLoading();
          location.href = "<?=base_url('admin/inicio')?>"
        }else{
          Swal.fire(respuesta['mensaje']);
        }

      },
      error:function(){
        Swal.fire('Ocurrio un error con el servidor!');
      }
    });
  }
  </script>
</html>
