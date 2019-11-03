<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<<<<<<< HEAD
    <meta charset="utf-8">
    <title>Inicio - CMS LCDLV</title>
  </head>
  <body>

=======
    <?php
      if($this->session->has_userdata('log')){
        $this->session;
        $nombre = $this->session->userdata('nombre');
      }else{
        $this->session->sess_destroy();
      }
     ?>
     <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
     <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
    <meta charset="utf-8">
    <title><?php echo 'Bienvenido '.$nombre ?></title>
  </head>
  <body>
<<<<<<< HEAD
    <?php
     var_dump($this->session->userdata('nombre'));
     ?>
>>>>>>> Back_php
=======
    <button type="button" name="button" onclick="logout()">Cerrar Sesion</button>
>>>>>>> Back_php
  </body>
  <script>
    function logout(){
      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/logout')?>',
        success:function(){
          alert('Esta saliendo');
          location.href = "<?=base_url('admin')?>";
        },
        error:function(){
          alert('no anduvo nada');
        }
      });
    }
  </script>
</html>
