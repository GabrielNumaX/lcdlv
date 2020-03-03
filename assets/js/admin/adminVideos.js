$(document).ready(function() {

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const ajaxVideos = `${protocol}//${URLmaster}/Videos/ajax_listado`;

   function createDataTable() { //funcion para crear datatables
       table = $('#videos_tabla').DataTable({
           "ajax": {
               url : ajaxVideos,
               type : 'GET'
           },
           language: {
               "sProcessing":     "Procesando...",
               "sLengthMenu":     "Mostrar _MENU_ registros",
               "sZeroRecords":    "No se encontraron resultados",
               "sEmptyTable":     "Ningún dato disponible en esta tabla",
               "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
               "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
               "sInfoPostFix":    "",
               "sSearch":         "Buscar:",
               "sUrl":            "",
               "sInfoThousands":  ",",
               "sLoadingRecords": "Cargando...",
               "oPaginate": {
                   "sFirst":    "Primero",
                   "sLast":     "Último",
                   "sNext":     "Siguiente",
                   "sPrevious": "Anterior"
               },
               "oAria": {
                   "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                   "sSortDescending": ": Activar para ordenar la columna de manera descendente"
               }
           }
       });
    }

    createDataTable();

    const cargarVideos = `${protocol}//${URLmaster}/Videos/cargar_videos`;

    function upVideo(){
      const titulo = document.getElementById('titulo_video').value;
      const desc = document.getElementById('desc_video').value;

      const modalVideos = document.getElementById("modalVideos");

      $(".upload-msg").text('Cargando...');
      const inputFileImage = document.getElementById('file_upload_video');
      const video = inputFileImage.files[0];
      let data = new FormData();

      data.append('file_upload_video', video);
      data.append('titulo', titulo);
      data.append('descripcion', desc);

      swal.fire({
        title: 'Subiendo Video',
      });
      swal.showLoading();

      $.ajax({
        type:'POST',
        url: cargarVideos,
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(){

          swal.close();
          
          document.getElementById('titulo_video').value = "";
          document.getElementById('desc_video').value = "";
          document.getElementById('file_upload_video').value = "";

          modalVideos.style.display = "none";

          table.ajax.reload();
        },

      });
    }

    $('#btn-video').on('click', upVideo);

    const borrarVideos = `${protocol}//${URLmaster}/Videos/borrar_video/`;

    function borrar_video(id){
      $.ajax({
        type:'POST',
        url: borrarVideos + id,
        success:function(){

          table.ajax.reload();
        },
        error:function(){
          alert('a la verga wey');
        },
      });
    }

    $('.div-tabla').on('click', '.btn.btn-sm.btn-danger', function() {

      Swal.fire({
        title: 'Confirmar Borrado',
        text: "Esto no se podra revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.value) {

          const id = $(this).parent().siblings('.sorting_1').html();

          borrar_video(id);

        }
      });
    });

    const editarVideos = `${protocol}//${URLmaster}/Videos/editar_video/`;

    function editar_video(id){
      $.ajax({
        type:'GET',
        url: editarVideos + id,
        dataType:'JSON',
        success:function(data){
            const modalVideos = document.getElementById('modalVideosEdit');

            document.getElementById('titulo-video_edit').value = data.titulo;
            document.getElementById('video_edit').value = data.descripcion;
            modalVideos.dataset.id = data.id;

            modalVideos.style.display = "block";

            // Get the <span> element that closes the modal
            const spanVideos = document.getElementById("span-videos_edit");

            // When the user clicks on <span> (x), close the modal
            spanVideos.onclick = function() {
            modalVideos.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modalVideos) {
              modalVideos.style.display = "none";
            }
          }

        },
        error:function(){
          alert('no vuelve nada');
        },
      });
    }

    $('.div-tabla').on('click', '.btn.btn-sm.btn-info', function() {

        const id = $(this).parent().siblings('.sorting_1').html();

        editar_video(id);
    });

    const updateVideos = `${protocol}//${URLmaster}/Videos/update_video/`;

    function guardar(){
      var titulo = document.getElementById('titulo-video_edit').value;
      var descripcion = document.getElementById('video_edit').value;
      const modal = document.getElementById('modalVideosEdit');
      var id = modal.dataset.id;
      $.ajax({
        type:'POST',
        url: updateVideos + id,
        data:{
          titulo:titulo,
          descripcion:descripcion
        },
        success:function(){

          modal.style.display = "none";
          table.ajax.reload();

        },
        error:function(){
            alert('se rompio');
        }
      });
    }

    $('#btn-video_editar').on('click', guardar)

    const logoutUrl = `${protocol}//${URLmaster}/Admin/logout`;

    const adminUrl = `${protocol}//${URLmaster}/admin`;

    function logout(){
      $.ajax({
        type:'POST',
        url: logoutUrl,
        success:function(){
          location.href = adminUrl;
        },
        error:function(){
          Swal.fire('no anduvo nada');
        }
      });
    }

    $('#btn-logout').on('click', logout);
    
}); //end jquery