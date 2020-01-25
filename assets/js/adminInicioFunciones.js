$(document).ready(function() {

    //aca estan las funciones para subir
    //ver el tema de las base_url
    //y el comentario en la function logout()

    function upPhoto(){
        var titulo = document.getElementById('titulo_foto').value;
        var desc = document.getElementById('desc_foto').value;
        $(".upload-msg").text('Cargando...');
        var inputFileImage = document.getElementById('file_upload_foto');
        var photo = inputFileImage.files[0];
        var data = new FormData();
        data.append('file_upload_foto', photo);
        $.ajax({
          type:'POST',
          url:'Admin/cargar_fotos/' + titulo+'/' + desc,
          data: data,
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
        $.ajax({
          type:'POST',
          url: 'Admin/cargar_videos/' + titulo + '/' + desc,
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
          url: 'Admin/cargar_notas/' + titulo + '/' + nota,
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
          url:'Admin/logout',
          success:function(){
              //esto hay q VER
            location.href = "<?=base_url('admin')?>";
          },
          error:function(){
            Swal.fire('no anduvo nada');
          }
        });
      }

      $('#btn-photo').on('click', upPhoto());

}); //end Jquery