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
     <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
     <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <meta charset="utf-8">
    <title><?php echo 'Bienvenido '.$nombre ?></title>
  </head>
  <body>

    <button type="button" name="button" onclick="logout()">Cerrar Sesion</button>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="<?=base_url('assets/favicon/favicon-32x32.png')?>" width="30" height="30" class="d-inline-block align-top" alt="">
        LCDLV
      </a>
      <button class="btn btn-danger" type="button" onclick="logout()"><i class="fas fa-sign-out-alt"></i></button>
    </nav>
    <div class="container">
      <h1>Opciones</h1>
      <button class="btn btn-success" id='imagen'><i class="far fa-file-image" onmouseover="$('#imagen').append('<p>Agregar imagen</p>')"></i></button>
      <button class="btn btn-success" ><i class="fas fa-video"></i></button>
      <button class="btn btn-success" >Agregar notas</button>

      <form method="post">
        <input type="file" id="file_upload">
        <input type="text" id="titulo" placeholder="Titulo" required>
        <input type="text" id="desc" placeholder="Descripcion" required>
        <input type="button" onclick="upPhoto()" value="Subir">
      </form>
      <div class="upload-msg"></div>
    </div>
  </body>
  <script>
    function upPhoto(){
      var titulo = document.getElementById('titulo').value;
      var desc = document.getElementById('desc').value;
      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload');
      var photo = inputFileImage.files[0];
      var data = new FormData();
      data.append('file_upload', photo);
      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/cargar/')?>'+titulo+'/'+desc,
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          alert(data);
          $(".upload-msg").html(data);
					window.setTimeout(function() {
					       $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
					       $(this).remove();
					       });	}, 5000);
        },

      });
    }
    function logout(){
      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/logout')?>',
        success:function(){
          Swal.fire({

          });
          location.href = "<?=base_url('admin')?>";
        },
        error:function(){
          Swal.fire('no anduvo nada');
        }
      });
    }
  </script>
</html>