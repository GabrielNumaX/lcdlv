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

     <link rel="stylesheet" href="<?=base_url()?>assets/css/admininicio.css">
     <script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>

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
    <div class="container div-inicio">

      <div class="div-btn">

        <button class="btn btn-success" id="photos">Fotos</button>
        <button class="btn btn-success" id="videos">Videos</button>
        <button class="btn btn-success" id="notes">Nota</button>
      </div>

      <!-- modales de los form -->

      <div id="modalPhotos" class="modal">

        <form class="form modal-content" method="post">

          <div class="span-close">
            <span id="span-photos" class="close">&times;</span>
          </div>

          <div class="text-div">
            <label>Titulo Foto</label>
            <input class="titulo" type="text" id="titulo_foto" placeholder="Titulo..."></input>
            <label>Descripcion Foto</label>
            <textarea id="desc_foto" placeholder="Descripcion..."></textarea>
          </div>
          <div class="btn-div">
            <input class="btn btn-success" type="file" id="file_upload_foto"></input>
            <input id="btn-photo" class="btn btn-success" 
                  type="button" 
                  onclick="upPhoto()"
                  value="Subir Foto"></input>
          </div>
        </form>

      </div>

      <!-- modal videos -->

      <div id="modalVideos" class="modal">

        <form class="form modal-content" method="post">

          <div class="span-close">
            <span id="span-videos" class="close">&times;</span>
          </div>

          <div class="text-div">
            <label>Titulo Video</label>
            <input class="titulo" type="text" id="titulo_video" placeholder="Titulo..."></input>
            <label>Descripcion Video</label>
            <textarea id="desc_video" placeholder="Descripcion..."></textarea>
          </div>
          <div class="btn-div">
            <input class="btn btn-success" type="file" id="file_upload_video"></input>
            <input class="btn btn-success" type="button" onclick="upVideo()" value="Subir Video"></input>
          </div>
        </form>

      </div>

      <!-- modal notas -->

      <div id="modalNotes" class="modal">

        <form class="form modal-content" method="post">

          <div class="span-close">
            <span id="span-notes" class="close">&times;</span>
          </div>

          <div class="text-div">
            <label>Titulo Nota</label>
            <input class="titulo" type="text" id="titulo_nota" placeholder="Titulo..."></input>
            <label>Nota</label>
            <textarea id="nota" placeholder="Nota"></textarea>
          </div>
          <div class="btn-div">
            <input class="btn btn-success" type="button" onclick="upNote()" value="Subir Nota"></input>
          </div>
        </form>

      </div>


    </div>



  </body>
  
   <script>

  //  function addEnter(element) {

  //   let formatedString = '';

  //   element.addEventListener('keyup', function(e) {

  //     if(e.keyCode === 13){

  //       formatedString += '\n';
  //     }

  //     else {
  //       formatedString += e.target.value
  //     }

  //     console.log(formatedString)
  //   });

  //   return formatedString;
  //  }

    function upPhoto(){
      var titulo = document.getElementById('titulo_foto').value;
      var desc = document.getElementById('desc_foto').value;

      // const desc = $('#desc_foto').val();

      // desc = $(desc).serialize();

      //esto no sirve guarda %3C br
      // desc = desc.replace(/\r?\n/g, '<br/>');

      // ver esto para php->html
      // https://stackoverflow.com/questions/2902888/adding-a-line-break-in-mysql-insert-into-text

      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload_foto');
      var photo = inputFileImage.files[0];
      var data = new FormData();
      data.append('file_upload_foto', photo);

      // https://www.javascripture.com/FormData
      // en el FormData() abria que hacer dos key con los values del
      //titulo y la descripcion ya que procesa signos
      //como en el ejemplo que esta ahi VER EJEMPLO!!!

      


      // for (var pair of formData.entries()) {

      //   let i = 0
      //   console.log(pair[i]); 
      //   i++;
      // }
     


      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/cargar_fotos')?>',          
        data: {
          titulo : titulo,
          descripcion : desc
        },
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          document.getElementById('titulo_foto').value = "";
          document.getElementById('desc_foto').value = "";
          document.getElementById('file_upload_foto').value = "";
          alert(data);
          $(".upload-msg").html(data);
					window.setTimeout(function() {
					       $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
					       $(this).remove();
					       });	}, 5000);
        },

      });
    }
    function upVideo(){
      var titulo = document.getElementById('titulo_video').value;
      var desc = document.getElementById('desc_video').value;
      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload_video');
      var video = inputFileImage.files[0];
      var data = new FormData();
      
      data.append('file_upload_video', video);
      data.append('titulo', titulo);
      data.append('descripcion', desc);


      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/cargar_videos/')?>'+titulo+'/'+desc,
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          document.getElementById('titulo_video').value = "";
          document.getElementById('desc_video').value = "";
          document.getElementById('file_upload_video').value = "";
          alert(data);
          $(".upload-msg").html(data);
					window.setTimeout(function() {
					       $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
					       $(this).remove();
					       });	}, 5000);
        },

      });
    }
    function upNote(){
      var titulo = document.getElementById('titulo_nota').value;
      var nota = document.getElementById('nota').value;
      $.ajax({
        type: 'POST',
        url: '<?=base_url('Admin/cargar_notas/')?>'+titulo+'/'+nota,
        data: {
          titulo: titulo,
          nota : nota
        },
        success: function(){
          //mostrar cargando
          document.getElementById('titulo_nota').value = "";
          document.getElementById('nota').value = "";
          alert('Nota Cargada')
        },
        error: function(){
          alert('Error 502');
        },
      });
    }
    function logout(){
      $.ajax({
        type:'POST',
        url:'<?=base_url('Admin/logout')?>',
        success:function(){
          location.href = "<?=base_url('admin')?>";
        },
        error:function(){
          Swal.fire('no anduvo nada');
        }
      });
    }
  </script>
</html>
