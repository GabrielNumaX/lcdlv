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
      if($this->session->has_userdata('nombre')){
        $this->session;
        $nombre = $this->session->userdata('nombre');
      }else{
        echo 'NO';
        $this->session->destroy();
      }

     ?>
    <meta charset="utf-8">
    <title><?php echo 'Bienvenido '.$nombre ?></title>
  </head>
  <body>
    <?php
     var_dump($this->session->userdata('nombre'));
     ?>
>>>>>>> Back_php
  </body>
</html>
