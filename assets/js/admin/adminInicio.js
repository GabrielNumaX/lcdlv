$(document).ready(function() {

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const ajaxFotos = `${protocol}//${URLmaster}/Fotos/ajax_listado`;

    function createDataTable() { //funcion para crear datatables
        table = $('#fotos').DataTable({
            "ajax": {
                url : ajaxFotos,
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

    const cargarFotos = `${protocol}//${URLmaster}/Fotos/cargar_fotos`;

    function upPhoto(){
      var titulo = document.getElementById('titulo_foto').value;
      var desc = document.getElementById('desc_foto').value;

      const modalPhotos = document.getElementById("modalPhotos");

      $(".upload-msg").text('Cargando...');
      var inputFileImage = document.getElementById('file_upload_foto');
      var photo = inputFileImage.files[0];
      var data = new FormData();
      data.append('file_upload_foto', photo);
      data.append('titulo', titulo);
      data.append('descripcion', desc);

      $.ajax({
        type:'POST',
        url: cargarFotos,
        data: data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data){
          document.getElementById('titulo_foto').value = "";
          document.getElementById('desc_foto').value = "";
          document.getElementById('file_upload_foto').value = "";

          modalPhotos.style.display= "none";
          //recarga la tabla cada vez que se sube una foto para que aparezca la nueva info
          table.ajax.reload();

          //esto es un canceric jajaja
          // $('span-photos').click();

        },
      });
    }
    
    $('#btn-photo').on('click', upPhoto);
    

    const borrarFotos = `${protocol}//${URLmaster}/Fotos/borrar_foto/`;

    /*Funcion para borrar fotos de la BDD*/
    function borrar_foto(id){
      $.ajax({
        type:'POST',
        url: borrarFotos + id,
        success:function(){
          /*no se si poner una alerta o no, queda medio cancer si pongo una!*/
          table.ajax.reload();
        },
        error:function(){
          /*y esto tambien queda medio cancer.. perohay que poner algo para el error,
          de ultima se puede hacer que aparezca un div en rojo con la info del error;*/
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Algo salio mal',
          });
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

          borrar_foto(id);

        }
      });
    });

    const editarFotos = `${protocol}//${URLmaster}/Fotos/editar_foto/`;

    function editar_foto(id){
      $.ajax({
        type:'GET',
        url: editarFotos + id,
        dataType:'JSON',
        success:function(data){

          const modalPhotos = document.getElementById('modalPhotosEdit');
          modalPhotos.dataset.id = data.id;
          document.getElementById('titulo-foto_edit').value = data.titulo;
          document.getElementById('foto_edit').value = data.descripcion;

          modalPhotos.style.display = "block";
          // Get the <span> element that closes the modal
          const spanPhotos = document.getElementById("span-photos_edit");

          // When the user clicks on <span> (x), close the modal
          spanPhotos.onclick = function() {
            modalPhotos.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modalPhotos) {
              modalPhotos.style.display = "none";
            }
          }
        },
        error:function(){
          //esto hay que sacarlo o hacer algo para el error no se!
          alert('Error');
        },
      });
    }

    $('.div-tabla').on('click', '.btn.btn-sm.btn-info', function() {

        const id = $(this).parent().siblings('.sorting_1').html();

        editar_foto(id);
    });

    const updateFotos = `${protocol}//${URLmaster}/Fotos/update_foto/`;

    function guardar(){
      var titulo = document.getElementById('titulo-foto_edit').value;
      var descripcion = document.getElementById('foto_edit').value;
      const modal = document.getElementById('modalPhotosEdit');
      var id = modal.dataset.id;
      $.ajax({
        type:'POST',
        url:updateFotos + id,
        data:{
          titulo:titulo,
          descripcion:descripcion
        },
        success:function(){

          modal.style.display = 'none';

          table.ajax.reload();
        },
        error:function(){

        }
      });
    }

    $('#btn-photo_editar').on('click', guardar)

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

    $('#btn-logout').on('click', logout)

}); //end Jquery


    

   

    
