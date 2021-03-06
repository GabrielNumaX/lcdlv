$(document).ready(function() {

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const ajaxUsuarios = `${protocol}//${URLmaster}/Admin/ajax_listado`;

    function createDataTable() { //funcion para crear datatables
        table = $('#usuarios').DataTable({
            "ajax": {
                url : ajaxUsuarios,
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

    const usuariosBorrar = `${protocol}//${URLmaster}/Admin/borrar_usuario/`;

    function borrar_usuario(id){
        $.ajax({
          type:'POST',
          url: usuariosBorrar+id,
          success:function(){
            // alert('borrado');
            table.ajax.reload();
          },
          error:function(){
            alert('Ha ocurrido un error');
          },
        });
      }

    $('.div-tabla').on('click', '.btn.btn-sm.btn-danger', function() {

      Swal.fire({
        title: 'Confirmar Borrado',
        text: "Esto no se podra revertir",
        // icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.value) {

          const id = $(this).parent().siblings('.sorting_1').html();
          //console.log('borrar');
          borrar_usuario(id);

        }
      });
    });

    const crearUsuario = `${protocol}//${URLmaster}/Admin/crear_usuario`;

    function upUser(){
        var nombre = document.getElementById('name').value;
        var apellido = document.getElementById('surname').value;
        var email = document.getElementById('email').value;
        var pass1 = document.getElementById('pass1').value;
        var pass2 = document.getElementById('pass2').value;
        var tipo = document.getElementById('type').value;

        //NO sacar esto perric!!! LEER COMENTARIO DE ABAJO
        const modalUser = document.getElementById('modalUser');
        if((pass1 === pass2) && (pass1 !== "" && pass2 !== "")){
          var data = new FormData();
          data.append('nombre', nombre);
          data.append('apellido', apellido);
          data.append('email', email);
          data.append('pass1', pass1);
          data.append('tipo', tipo);
          $.ajax({
              type: 'POST',
              url: crearUsuario,
              data: data,
              contentType: false,
              processData: false,
              cache: false,
              success: function(data){
                datalert = JSON.parse(data);
                  //mostrar cargando
                  document.getElementById('name').value = "";
                  document.getElementById('surname').value = "";
                  document.getElementById('email').value = "";
                  document.getElementById('pass1').value = "";
                  document.getElementById('pass2').value = "";

                  if(datalert.creado === true){
                    Swal.fire({
                      title: datalert.mensaje,
                      text: "Aceptar",
                    });
                  }
                  else {
                    Swal.fire({
                      title: datalert.mensaje,
                      text: "Aceptar",
                    });
                  }
                  
                  //NO sacar esto perric es para q cierre el modal despues de cargar
                  modalUser.style.display = 'none';
                  // alert('Nota Cargada');
                  table.ajax.reload();
              },
              error: function(){
                  alert('Error 502');
              },
          });
        }else{
          alert('las pass no son iguales');
        }
      }

    $('#pass2').on('keyup', function(e){

      const pass1 = document.getElementById('pass1').value;

      const verify = document.getElementById('pass-verify');

      const btn = document.getElementById('btn-user');

      if(e.target.value != pass1){

        verify.style.display = 'block';

        btn.disabled = true;
      }
      else {

        verify.style.display = 'none';

        btn.disabled = false;

        $('#btn-user').unbind('click').click(function() {
    
        upUser();

      });
    }  
  });

    const updateUser = `${protocol}//${URLmaster}/Admin/update_user/`;

    function editar(id){
      $.ajax({
        type:'POST',
        url: updateUser + id,
        dataType:'JSON',
        success:function(data){
          const modalUser = document.getElementById('modalUser_edit');
          modalUser.dataset.id = data.id;
          document.getElementById('name_edit').value = data.nombre;
          document.getElementById('surname_edit').value = data.apellido;
          document.getElementById('email_edit').value = data.email;
          document.getElementById('pass1_edit').value = "";
          document.getElementById('pass2_edit').value = "";
         
          $('#type_edit').val(data.tipo);
    
          modalUser.style.display = "block";
    
          const spanUser = document.getElementById("span-user_edit");
    
          // When the user clicks on <span> (x), close the modal
          spanUser.onclick = function() {
              modalUser.style.display = "none";
          }
    
          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
              if (event.target == modalUser) {
              modalUser.style.display = "none";
              }
          }
        },
      });
    }
    
    $('#btn-edit-user').on('click', function() {
      
      const idFromData = $('#btn-edit-user').attr('data-id');
      
      editar(idFromData)
    });
    
    $('#btn-user_edit').on('click', function() {
    
      const pass1 = document.getElementById('pass1_edit').value;
    
      const pass2 = document.getElementById('pass2_edit').value;
    
      const modalUser = document.getElementById('modalUser_edit');
    
      if(pass1 === '' && pass2 === ''){
    
        guardar();
    
        modalUser.style.display = 'none';
    
      }
      else {
    
        $('#pass2_edit').on('keyup', function(e){
    
          const verify = document.getElementById('pass-verify_edit');
    
          const btn = document.getElementById('btn-user_edit');
    
          if(e.target.value !== pass1){
    
           verify.style.display = 'block';
    
           btn.disabled = true;
          }
          else {
        
           verify.style.display = 'none';
    
           btn.disabled = false;
    
            $('#btn-user_edit').on('click', function() {
              
              guardar();
    
              modalUser.style.display = 'none';
    
            });
          }
        });
      }
    })

    $('#btn-user_delete').on('click', function(){

      Swal.fire({
        title: 'Borrar Usuario',
        text: "La sesion se cerrara",
        // icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.value) {

          const idFromData = $('#btn-edit-user').attr('data-id');

          borrar_usuario(idFromData);

          logout();
        }
      });


    });

    

    const guardarUsuarios = `${protocol}//${URLmaster}/Admin/save_user`;

    function guardar(){
    
        const modalUser = document.getElementById('modalUser_edit');
        var id = modalUser.dataset.id;
        var name = document.getElementById('name_edit').value;
        var surname = document.getElementById('surname_edit').value;
        var email = document.getElementById('email_edit').value;
        var rol = document.getElementById('type_edit').value;
        var pass1 = document.getElementById('pass1_edit').value;
        var pass2 = document.getElementById('pass2_edit').value;
        $.ajax({
            type:'POST',
            url: guardarUsuarios,
            data:{
              id:id,
              name:name,
              surname:surname,
              email:email,
              rol:rol,
              pass1:pass1,
              pass2:pass2
            },
            success:function(){
    
                modalUser.style.display = 'none';
    
                table.ajax.reload();
            },
            error:function(){
                alert('Error al actualizar usuario');
            }
        });
    }

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
            Swal.fire('Error');
            }
        });
    }

    $('#btn-logout').on('click', function(){
      
      logout();
    
    });

}); //end jquery
