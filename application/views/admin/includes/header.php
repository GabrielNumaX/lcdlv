<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    if(isset($_SESSION['nombre']) && isset($_SESSION['log'])){
      $nombre = $_SESSION['nombre'];
      $log    = $_SESSION['log'];
    }else{
      header('Location: admin.php');
    }
     ?>
     <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

     <link rel="stylesheet" href="<?=base_url()?>assets/css/admininicio.css">
     <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>
     <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>

      <!-- ver los comentarios de este archivo -->
     <script src="<?=base_url()?>assets/js/adminInicioModal.js"></script>

     <script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <meta charset="utf-8">
    <title><?php echo 'Bienvenido '.$nombre ?></title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="<?=base_url('assets/favicon/favicon-32x32.png')?>" width="30" height="30" class="d-inline-block align-top" alt="">
        LCDLV
      </a>
      <button class="btn btn-danger" type="button" onclick="logout()"><i class="fas fa-sign-out-alt"></i></button>
    </nav>
