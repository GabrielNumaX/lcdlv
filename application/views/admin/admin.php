<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lcdlv - CMS Login</title>
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/adminhome.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
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

          <div class="btn-div">
            <button class="btn btn-success" type="button" name="button" onclick="login()">Ingresar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script>
  function login(){
    var usuario = document.getElementById('user').value;
    var password = document.getElementById('pass').value;
    if(usuario !== '' && password !== ''){
      $.ajax({
        type:'POST',
        url:'<?= base_url('Admin/login')?>',
        data:{
          usuario:usuario,
          password:password
        },
        success:function(respuesta){
          JSON.parse(respuesta);
          location.href = '<?=base_url('Admin/inicio')?>';
        },
        error:function(){
          swal.fire({
            type:'error',
            title:'Error',
            text: 'Ha ocurrido un error'
          });
        }
      });
    }else{
      swal.fire({
        type:'warning',
        text:'Complete todos los campos'
      });
    }
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
          Swal.showLoading();
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
