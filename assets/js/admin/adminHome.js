$(document).ready(function() {


    // esto es para que el boton haga click con enter
    $('#pass').on('keyup', function(e) {

        e.preventDefault();

        if(e.keyCode === 13){
 
            login();
          }
    });

    const protocol = window.location.protocol;
    const URLmaster = window.location.host;

    const loginUrl = `${protocol}//${URLmaster}/admin/login`;

    const adminUrl = `${protocol}//${URLmaster}/admin/inicio`;

    function login(){
        user = document.getElementById('user').value;
        pass = document.getElementById('pass').value;
        $.ajax({
          type:'POST',
          url: loginUrl,
          data:{
            pass:pass,
            user:user
          },
          success:function(r){
            response = JSON.parse(r);
            if(response.estado == true){
                location.href = adminUrl;
            }else{
              const mensaje = document.getElementById('mensaje');
              mensaje.innerHTML = '<p style="color:red; padding: 0; margin: 0;">'+response.mensaje+'</p>';
              mensaje.style.display = "flex";
            }
    
    
          },
          error:function(){
            Swal.fire('Ocurrio un error con el servidor!');
          }
      });
    }

    $('#btn-login').on('click', login);
   
}); //end Jquery