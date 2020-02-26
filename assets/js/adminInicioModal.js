$(document).ready(function() {

//Pregunta si existe el elemento, es mas facil que multiples archivos
if(document.getElementById('modalPhotos')){
  // Get the modal
  const modalPhotos = document.getElementById("modalPhotos");

  const tituloFoto = document.getElementById('titulo_foto');

  const descripcion = document.getElementById('desc_foto');

  // Get the button that opens the modal
  const btnPhotos = document.getElementById("photos");

  // Get the <span> element that closes the modal
  const spanPhotos = document.getElementById("span-photos");

  // When the user clicks on the button, open the modal
  btnPhotos.onclick = function() {
    modalPhotos.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  spanPhotos.onclick = function() {

    tituloFoto.value = '';
    
    descripcion.value = '';

    modalPhotos.style.display = "none";
  }


  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modalPhotos) {

      tituloFoto.value = '';
    
      descripcion.value = '';

      modalPhotos.style.display = "none";
    }
  }

}
if(document.getElementById('modalVideos')){
  // Get the modal
  const modalVideos = document.getElementById("modalVideos");

  const tituloVideo = document.getElementById('titulo_video');

  const descripcion = document.getElementById('desc_video');

  // Get the button that opens the modal
  const btnVideos = document.getElementById("videos");

  // Get the <span> element that closes the modal
  const spanVideos = document.getElementById("span-videos");

  // When the user clicks on the button, open the modal
  btnVideos.onclick = function() {
    modalVideos.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  spanVideos.onclick = function() {

    tituloVideo.value = '';

    descripcion.value = '';

    modalVideos.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modalVideos) {

      tituloVideo.value = '';

      descripcion.value = '';
    
      modalVideos.style.display = "none";
    }
  }
}
if(document.getElementById('modalNotes')){
  // Get the modal
  const modalNotes = document.getElementById("modalNotes");

  const tituloNota = document.getElementById('titulo_nota');

  const nota = document.getElementById('nota');

  // Get the button that opens the modal
  const btnNotes = document.getElementById("notes");

  // Get the <span> element that closes the modal
  const spanNotes = document.getElementById("span-notes");

  // When the user clicks on the button, open the modal
  btnNotes.onclick = function() {
    modalNotes.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  spanNotes.onclick = function() {

    tituloNota.value = "";

    nota.value = "";

    modalNotes.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modalNotes) {

      tituloNota.value = "";

      nota.value = "";

      modalNotes.style.display = "none";
    }
  }
}
if(document.getElementById('modalUser')){
  // Get the modal
  const modalUser = document.getElementById("modalUser");

  const nombre = document.getElementById('name');
  const apellido = document.getElementById('surname');
  const email = document.getElementById('email');
  const pass1 = document.getElementById('pass1');
  const pass2 = document.getElementById('pass2');

  // Get the button that opens the modal
  const btnUser = document.getElementById("user");

  // Get the <span> element that closes the modal
  const spanUser = document.getElementById("span-user");

  // When the user clicks on the button, open the modal
  btnUser.onclick = function() {
    modalUser.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  spanUser.onclick = function() {
    
    nombre.value = '';
    apellido.value = '';
    email.value = '';
    pass1.value = '';
    pass2.value = '';

    modalUser.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modalUser) {

      nombre.value = '';
      apellido.value = '';
      email.value = '';
      pass1.value = '';
      pass2.value = '';
     
      modalUser.style.display = "none";
    }
  }
}
}); //end jquery
